<?php

namespace App\Http\Controllers;

use App\Models\BuildOperationNote;
use App\Models\BuildQcLog;
use App\Models\BuildSignoffLog;
use App\Models\BuildStepLog;
use App\Models\Vehicle;
use App\Models\VehicleBuildOperation;
use App\Models\VehicleBuildStation;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuildProcessController extends Controller
{
    /**
     * GET /api/vehicles/{vehicleId}/build-process
     *
     * Returns the full master template for a vehicle:
     * stations → operations → steps + PPE + tools + materials + hazards + QC templates + signoff templates.
     * This is always the master blueprint (vehicle_id only, never vehicle_model_id).
     */
    public function masterTemplate($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);

        $stations = VehicleBuildStation::with([
            'operations' => fn($q) => $q->orderBy('order'),
            'operations.steps' => fn($q) => $q->orderBy('order'),
            'operations.ppes',
            'operations.tools',
            'operations.materials',
            'operations.hazards',
            'operations.qcChecks' => fn($q) => $q->orderBy('order'),
            'operations.signoffs' => fn($q) => $q->orderBy('order'),
        ])
        ->where('vehicle_id', $vehicle->id)
        ->orderBy('order')
        ->get();

        return response()->json([
            'vehicle' => [
                'id'   => $vehicle->id,
                'name' => $vehicle->name,
                'make' => $vehicle->make,
                'model'=> $vehicle->model,
                'year' => $vehicle->year,
            ],
            'stations' => $stations,
        ]);
    }

    /**
     * GET /api/builds/{buildId}/process-state
     *
     * Returns the live state for a specific commissioned build:
     * - Step completion logs (keyed by vehicle_build_step_id)
     * - QC result logs (keyed by operation_qc_check_id)
     * - Signoff logs (keyed by operation_signoff_id)
     * - Operation notes (keyed by vehicle_build_operation_id)
     *
     * The master template data is NOT returned here — it comes from masterTemplate().
     * The frontend merges both responses to build the UI.
     */
    public function buildState($buildId)
    {
        $build = VehicleModel::with('vehicle')->findOrFail($buildId);

        $stepLogs = BuildStepLog::where('vehicle_model_id', $build->id)
            ->get()
            ->keyBy('vehicle_build_step_id')
            ->map(fn($log) => [
                'is_completed' => (bool) $log->is_completed,
                'image_path'   => $log->image_path ? asset('storage/' . $log->image_path) : null,
                'completed_by' => $log->completed_by,
                'completed_at' => $log->completed_at,
            ]);

        $qcLogs = BuildQcLog::where('vehicle_model_id', $build->id)
            ->get()
            ->keyBy('operation_qc_check_id')
            ->map(fn($log) => [
                'status'    => $log->status,
                'notes'     => $log->notes,
                'logged_by' => $log->logged_by,
                'logged_at' => $log->logged_at,
            ]);

        $signoffLogs = BuildSignoffLog::where('vehicle_model_id', $build->id)
            ->get()
            ->keyBy('operation_signoff_id')
            ->map(fn($log) => [
                'signed_by'      => $log->signed_by,
                'signature_data' => $log->signature_data,
                'signed_at'      => $log->signed_at,
            ]);

        $opNotes = BuildOperationNote::where('vehicle_model_id', $build->id)
            ->get()
            ->keyBy('vehicle_build_operation_id')
            ->map(fn($note) => [
                'notes'              => $note->notes,
                'diagram_image_path' => $note->diagram_image_path
                    ? asset('storage/' . $note->diagram_image_path)
                    : null,
            ]);

        // Overall progress
        $total     = $stepLogs->count();
        $completed = $stepLogs->filter(fn($s) => $s['is_completed'])->count();
        $pct       = $total > 0 ? round(($completed / $total) * 100) : 0;

        return response()->json([
            'build' => [
                'id'         => $build->id,
                'name'       => $build->name,
                'vin'        => $build->vin,
                'vehicle_id' => $build->vehicle_id,
            ],
            'step_logs'    => $stepLogs,
            'qc_logs'      => $qcLogs,
            'signoff_logs' => $signoffLogs,
            'op_notes'     => $opNotes,
            'progress'     => [
                'total'     => $total,
                'completed' => $completed,
                'pct'       => $pct,
            ],
        ]);
    }

    /**
     * POST /api/builds/{buildId}/steps/{stepId}/toggle
     *
     * Toggle a step's is_completed state for a specific build.
     * Records who completed it and when.
     */
    public function toggleStep(Request $request, $buildId, $stepId)
    {
        if ($buildId === 'master') {
            $step = \App\Models\VehicleBuildStep::with('operation')->findOrFail($stepId);
            $station = \App\Models\VehicleBuildStation::findOrFail($step->operation->vehicle_build_station_id);
            $vehicleId = $station->vehicle_id;
            $vehicleModelId = null;
        } else {
            $build = VehicleModel::findOrFail($buildId);
            $vehicleId = $build->vehicle_id;
            $vehicleModelId = $build->id;
        }

        $log = BuildStepLog::updateOrCreate(
            [
                'vehicle_model_id'      => $vehicleModelId,
                'vehicle_build_step_id' => $stepId,
            ],
            [
                'vehicle_id'   => $vehicleId,
                'is_completed' => $request->boolean('is_completed'),
                'completed_by' => auth()->id(),
                'completed_at' => $request->boolean('is_completed') ? now() : null,
            ]
        );

        return response()->json(['success' => true, 'log' => $log]);
    }

    /**
     * POST /api/builds/{buildId}/steps/{stepId}/image
     *
     * Upload a job photo for a specific step on a specific build.
     * This image is PRIVATE to this build — it does NOT affect the master template.
     * The master template image (vehicle_build_steps.image_path) is shown separately as reference.
     */
    public function removeStepImage($buildId, $stepId)
    {
        \Illuminate\Support\Facades\Log::info("removeStepImage called with buildId=$buildId, stepId=$stepId");
        
        $vehicleModelId = $buildId === 'master' ? null : $buildId;
        
        $log = \App\Models\BuildStepLog::where('vehicle_model_id', $vehicleModelId)
            ->where('vehicle_build_step_id', $stepId)
            ->first();
            
        if ($log && $log->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($log->image_path);
            $log->update(['image_path' => null]);
        }
        
        return response()->json(['success' => true]);
    }

    public function uploadStepImage(Request $request, $buildId, $stepId)
    {
        $request->validate(['image' => 'required|image|max:10240']);

        if ($buildId === 'master') {
            $step = \App\Models\VehicleBuildStep::with('operation')->findOrFail($stepId);
            $station = \App\Models\VehicleBuildStation::findOrFail($step->operation->vehicle_build_station_id);
            $vehicleId = $station->vehicle_id;
            $vehicleModelId = null;
            $folderName = "master-{$vehicleId}";
        } else {
            $build = VehicleModel::findOrFail($buildId);
            $vehicleId = $build->vehicle_id;
            $vehicleModelId = $build->id;
            $folderName = $build->id;
        }

        $path = $request->file('image')->store("builds/{$folderName}/steps", 'public');

        $log = BuildStepLog::updateOrCreate(
            [
                'vehicle_model_id'      => $vehicleModelId,
                'vehicle_build_step_id' => $stepId,
            ],
            [
                'vehicle_id' => $vehicleId,
                'image_path' => $path,
            ]
        );

        return response()->json([
            'success'    => true,
            'image_url'  => asset('storage/' . $path),
        ]);
    }

    /**
     * POST /api/builds/{buildId}/qc/{qcId}
     *
     * Save a QC pass/fail result for a specific build.
     */
    public function saveQc(Request $request, $buildId, $qcId)
    {
        $request->validate([
            'status' => 'nullable|in:pass,fail',
            'notes'  => 'nullable|string|max:1000',
        ]);

        if ($buildId === 'master') {
            $qc = \App\Models\OperationQcCheck::with('operation')->findOrFail($qcId);
            $station = \App\Models\VehicleBuildStation::findOrFail($qc->operation->vehicle_build_station_id);
            $vehicleId = $station->vehicle_id;
            $vehicleModelId = null;
        } else {
            $build = VehicleModel::findOrFail($buildId);
            $vehicleId = $build->vehicle_id;
            $vehicleModelId = $build->id;
        }

        $log = BuildQcLog::updateOrCreate(
            [
                'vehicle_model_id'      => $vehicleModelId,
                'operation_qc_check_id' => $qcId,
            ],
            [
                'vehicle_id' => $vehicleId,
                'status'     => $request->status,
                'notes'      => $request->notes,
                'logged_by'  => auth()->id(),
                'logged_at'  => now(),
            ]
        );

        return response()->json(['success' => true, 'log' => $log]);
    }

    /**
     * POST /api/builds/{buildId}/signoff/{signoffId}
     *
     * Save a technician/QA signature for a specific build operation.
     * Signature is stored as base64 canvas data (or cleared if empty).
     */
    public function removeSignoff($buildId, $signoffId)
    {
        if ($buildId === 'master') {
            $vehicleModelId = null;
        } else {
            $build = \App\Models\VehicleModel::findOrFail($buildId);
            $vehicleModelId = $build->id;
        }

        $log = \App\Models\BuildSignoffLog::where('vehicle_model_id', $vehicleModelId)
            ->where('operation_signoff_id', $signoffId)
            ->first();

        if ($log) {
            $log->update([
                'signature_data' => null,
                'signed_at'      => null,
                'signed_by'      => null
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function saveSignoff(Request $request, $buildId, $signoffId)
    {
        $request->validate([
            'signed_by'      => 'required|string|max:255',
            'signature_data' => 'nullable|string', // base64 canvas image
        ]);

        if ($buildId === 'master') {
            $signoff = \App\Models\OperationSignoff::with('operation')->findOrFail($signoffId);
            $station = \App\Models\VehicleBuildStation::findOrFail($signoff->operation->vehicle_build_station_id);
            $vehicleId = $station->vehicle_id;
            $vehicleModelId = null;
        } else {
            $build = VehicleModel::findOrFail($buildId);
            $vehicleId = $build->vehicle_id;
            $vehicleModelId = $build->id;
        }

        $log = BuildSignoffLog::updateOrCreate(
            [
                'vehicle_model_id'     => $vehicleModelId,
                'operation_signoff_id' => $signoffId,
            ],
            [
                'vehicle_id'     => $vehicleId,
                'signed_by'      => $request->signed_by,
                'signature_data' => $request->signature_data,
                'signed_at'      => $request->signature_data ? now() : null,
            ]
        );

        return response()->json(['success' => true, 'log' => $log]);
    }

    /**
     * POST /api/builds/{buildId}/operations/{opId}/notes
     *
     * Save technician notes for a specific operation on a specific build.
     */
    public function saveOperationNote(Request $request, $buildId, $opId)
    {
        $request->validate([
            'notes' => 'nullable|string|max:5000',
        ]);

        if ($buildId === 'master') {
            $operation = \App\Models\VehicleBuildOperation::findOrFail($opId);
            $station = \App\Models\VehicleBuildStation::findOrFail($operation->vehicle_build_station_id);
            $vehicleId = $station->vehicle_id;
            $vehicleModelId = null;
        } else {
            $build = VehicleModel::findOrFail($buildId);
            $vehicleId = $build->vehicle_id;
            $vehicleModelId = $build->id;
        }

        $note = BuildOperationNote::updateOrCreate(
            [
                'vehicle_model_id'            => $vehicleModelId,
                'vehicle_build_operation_id'  => $opId,
            ],
            [
                'vehicle_id' => $vehicleId,
                'notes'      => $request->notes,
                'logged_by'  => auth()->id(),
            ]
        );

        return response()->json(['success' => true, 'note' => $note]);
    }

    /**
     * POST /api/builds/{buildId}/operations/{opId}/diagram
     *
     * Upload a job-floor work sequence photo for a specific operation on a specific build.
     * This image is PRIVATE to this build — the master diagram (vehicle_build_operations.diagram_svg)
     * is still shown as the reference. This is an ADDITIONAL job photo, not a replacement.
     */
    public function uploadOperationDiagram(Request $request, $buildId, $opId)
    {
        $request->validate(['image' => 'required|image|max:20480']);

        if ($buildId === 'master') {
            $operation = \App\Models\VehicleBuildOperation::findOrFail($opId);
            $station = \App\Models\VehicleBuildStation::findOrFail($operation->vehicle_build_station_id);
            $vehicleId = $station->vehicle_id;
            $vehicleModelId = null;
            $folderName = "master-{$vehicleId}";
        } else {
            $build = VehicleModel::findOrFail($buildId);
            $vehicleId = $build->vehicle_id;
            $vehicleModelId = $build->id;
            $folderName = $build->id;
        }

        $path = $request->file('image')->store("builds/{$folderName}/diagrams", 'public');

        $note = BuildOperationNote::updateOrCreate(
            [
                'vehicle_model_id'           => $vehicleModelId,
                'vehicle_build_operation_id' => $opId,
            ],
            [
                'vehicle_id'         => $vehicleId,
                'diagram_image_path' => $path,
                'logged_by'          => auth()->id(),
            ]
        );

        return response()->json([
            'success'   => true,
            'image_url' => asset('storage/' . $path),
        ]);
    }

    /**
     * GET /api/builds/{buildId}/progress
     *
     * Returns overall completion percentage for a build.
     */
    public function progress($buildId)
    {
        if ($buildId === 'master') {
            return response()->json(['total' => 0, 'completed' => 0, 'pct' => 0]);
        }
        
        $total     = BuildStepLog::where('vehicle_model_id', $buildId)->count();
        $completed = BuildStepLog::where('vehicle_model_id', $buildId)->where('is_completed', true)->count();
        $pct       = $total > 0 ? round(($completed / $total) * 100) : 0;

        return response()->json([
            'total'     => $total,
            'completed' => $completed,
            'pct'       => $pct,
        ]);
    }

    /**
     * POST /api/master/steps/{stepId}/image
     *
     * Upload a reference photo to a MASTER template step.
     * Stores to vehicle_build_steps.image_path and is shown to ALL builds as the reference photo.
     * Job photos uploaded by technicians (per-build) do NOT overwrite this.
     */
    public function removeMasterStepImage($stepId)
    {
        $step = \App\Models\VehicleBuildStep::findOrFail($stepId);
        if ($step->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($step->image_path);
            $step->update(['image_path' => null]);
        }
        return response()->json(['success' => true]);
    }

    public function uploadMasterStepImage(Request $request, $stepId)
    {
        $request->validate(['image' => 'required|image|max:10240']);

        $step = \App\Models\VehicleBuildStep::findOrFail($stepId);

        // Remove old image from storage if it exists
        if ($step->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($step->image_path);
        }

        $path = $request->file('image')->store("master/steps/{$stepId}", 'public');

        $step->update(['image_path' => $path]);

        return response()->json([
            'success'   => true,
            'image_url' => asset('storage/' . $path),
        ]);
    }

    /**
     * POST /api/master/operations/{opId}/diagram
     *
     * Upload a reference diagram image to a MASTER template operation.
     * Stores to vehicle_build_operations.diagram_image_path.
     * Shown to ALL builds as the Work Sequence reference diagram.
     */
    public function uploadMasterDiagram(Request $request, $opId)
    {
        $request->validate(['image' => 'required|image|max:20480']);

        $operation = VehicleBuildOperation::findOrFail($opId);

        if ($operation->diagram_image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($operation->diagram_image_path);
        }

        $path = $request->file('image')->store("master/operations/{$opId}", 'public');

        $operation->update(['diagram_image_path' => $path]);

        return response()->json([
            'success'   => true,
            'image_url' => asset('storage/' . $path),
        ]);
    }

    public function removeMasterDiagram($opId)
    {
        $operation = VehicleBuildOperation::findOrFail($opId);

        if ($operation->diagram_image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($operation->diagram_image_path);
            $operation->update(['diagram_image_path' => null]);
        }

        return response()->json(['success' => true]);
    }
}
