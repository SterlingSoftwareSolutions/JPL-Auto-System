<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\ADR;
use App\Models\Compliance;
use App\Models\ModelReportApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pages.vehicles.index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        $data = $request->only(['name', 'make', 'model', 'year']);
        
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('vehicles', 'public');
        }

        Vehicle::create($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully.');
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        $data = $request->only(['name', 'make', 'model', 'year']);
        
        if ($request->has('remove_image') && $request->remove_image == '1') {
            $data['image_path'] = null;
            if ($vehicle->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($vehicle->image_path);
            }
        } elseif ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('vehicles', 'public');
            if ($vehicle->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($vehicle->image_path);
            }
        }

        $vehicle->update($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }

    public function report($id)
    {
        $vehicle = Vehicle::with([
            'builds.parts',
            'builds.timelineTasks',
            'builds.buildStepLogs',
            'builds.buildQcLogs',
            'builds.buildSignoffLogs',
            'modelReportApprovals'
        ])->findOrFail($id);

        // Load master blueprint once for this vehicle (shared across all builds)
        $masterStations = \App\Models\VehicleBuildStation::with([
            'operations'          => fn($q) => $q->orderBy('order'),
            'operations.steps'    => fn($q) => $q->orderBy('order'),
            'operations.ppes',
            'operations.tools',
            'operations.materials',
            'operations.hazards',
            'operations.qcChecks' => fn($q) => $q->orderBy('order'),
            'operations.signoffs' => fn($q) => $q->orderBy('order'),
        ])->where('vehicle_id', $id)->orderBy('order')->get();

        // --- NEW: Load logs specifically for the master template (where vehicle_model_id is null) ---
        $masterStepLogs    = \App\Models\BuildStepLog::where('vehicle_id', $id)->whereNull('vehicle_model_id')->get()->keyBy('vehicle_build_step_id');
        $masterQcLogs      = \App\Models\BuildQcLog::where('vehicle_id', $id)->whereNull('vehicle_model_id')->get()->keyBy('operation_qc_check_id');
        $masterSignoffLogs = \App\Models\BuildSignoffLog::where('vehicle_id', $id)->whereNull('vehicle_model_id')->get()->keyBy('operation_signoff_id');

        $masterTemplateProcess = $masterStations->map(function ($station) use ($masterStepLogs, $masterQcLogs, $masterSignoffLogs) {
            $stationClone = clone $station;
            $stationClone->setRelation('operations', $station->operations->map(function ($operation) use ($masterStepLogs, $masterQcLogs, $masterSignoffLogs) {
                $opClone = clone $operation;
                $opClone->setRelation('steps', $operation->steps->map(function ($step) use ($masterStepLogs) {
                    $stepClone = clone $step;
                    $log = $masterStepLogs->get($step->id);
                    $stepClone->is_completed  = $log ? (bool) $log->is_completed : false;
                    $stepClone->job_image_path = ($log && $log->image_path) ? asset('storage/' . $log->image_path) : null;
                    return $stepClone;
                }));
                $opClone->setRelation('qcChecks', $operation->qcChecks->map(function ($qc) use ($masterQcLogs) {
                    $qcClone = clone $qc;
                    $log = $masterQcLogs->get($qc->id);
                    $qcClone->status = $log ? $log->status : null;
                    return $qcClone;
                }));
                $opClone->setRelation('signoffs', $operation->signoffs->map(function ($signoff) use ($masterSignoffLogs) {
                    $sigClone = clone $signoff;
                    $log = $masterSignoffLogs->get($signoff->id);
                    $sigClone->signed_by      = $log ? $log->signed_by : null;
                    $sigClone->signature_data = $log ? $log->signature_data : null;
                    $sigClone->signed_at      = $log ? $log->signed_at : null;
                    return $sigClone;
                }));
                return $opClone;
            }));
            return $stationClone;
        });
        // ---------------------------------------------------------------------------------------------

        foreach ($vehicle->builds as $build) {
            // Key the log tables by their master template ID for fast lookup
            $stepLogs    = $build->buildStepLogs->keyBy('vehicle_build_step_id');
            $qcLogs      = $build->buildQcLogs->keyBy('operation_qc_check_id');
            $signoffLogs = $build->buildSignoffLogs->keyBy('operation_signoff_id');

            // Deep-clone the master stations so we can attach per-build state
            // without mutating the shared master collection
            $stations = $masterStations->map(function ($station) use ($stepLogs, $qcLogs, $signoffLogs) {
                $stationClone = clone $station;
                $stationClone->setRelation('operations', $station->operations->map(function ($operation) use ($stepLogs, $qcLogs, $signoffLogs) {
                    $opClone = clone $operation;

                    // Merge step completion + job image from build_step_logs
                    $opClone->setRelation('steps', $operation->steps->map(function ($step) use ($stepLogs) {
                        $stepClone = clone $step;
                        $log = $stepLogs->get($step->id);
                        $stepClone->is_completed  = $log ? (bool) $log->is_completed : false;
                        $stepClone->job_image_path = ($log && $log->image_path)
                            ? asset('storage/' . $log->image_path)
                            : null;
                        return $stepClone;
                    }));

                    // Merge QC results from build_qc_logs
                    $opClone->setRelation('qcChecks', $operation->qcChecks->map(function ($qc) use ($qcLogs) {
                        $qcClone = clone $qc;
                        $log = $qcLogs->get($qc->id);
                        $qcClone->status = $log ? $log->status : null;
                        return $qcClone;
                    }));

                    // Merge signoff state from build_signoff_logs
                    $opClone->setRelation('signoffs', $operation->signoffs->map(function ($signoff) use ($signoffLogs) {
                        $sigClone = clone $signoff;
                        $log = $signoffLogs->get($signoff->id);
                        $sigClone->signed_by      = $log ? $log->signed_by : null;
                        $sigClone->signature_data = $log ? $log->signature_data : null;
                        $sigClone->signed_at      = $log ? $log->signed_at : null;
                        return $sigClone;
                    }));

                    return $opClone;
                }));
                return $stationClone;
            });

            $build->processState = $stations;
        }

        $vehicleInfo = \App\Models\VehicleInformation::where('vehicle_id', $id)->get();
        $categories = \App\Models\SpecificationCategory::with(['specifications' => function($q) use ($id) {
            $q->where('vehicle_id', $id);
        }])->get();
        $vehicleImages = \App\Models\VehicleImage::where('vehicle_id', $id)->get()->keyBy('figure_number');

        $partCategories = \App\Models\PartCategory::with(['parts' => function($q) use ($id) {
            $q->where('vehicle_id', $id)->with(['component', 'supplier']);
        }])->whereHas('parts', function($q) use ($id) {
            $q->where('vehicle_id', $id);
        })->get();

        $vehicleSuppliers = $vehicle->suppliers;

        $adrs = \App\Models\ADR::all();
        $compliances = $vehicle->compliances()->with(['evidenceType', 'eceNumber', 'componentDetails', 'systemStatus'])->get()->keyBy('adr_id');
        
        $adrDataForFrontend = [];
        foreach ($adrs as $adr) {
            $comp = $compliances->get($adr->id);
            $evidence = [];
            if ($comp && $comp->evidenceType) {
                if ($comp->evidenceType->ece) $evidence[] = 'ece';
                if ($comp->evidenceType->test) $evidence[] = 'test';
                if ($comp->evidenceType->cta) $evidence[] = 'cta';
            }
            $status = 'full';
            if ($comp && $comp->systemStatus) {
                $status = strtolower($comp->systemStatus->status) === 'pending' ? 'pending' : 'full';
            }
            $adrDataForFrontend[] = [
                'id' => $adr->id,
                'adr' => $adr->adrtext,
                'title' => $adr->title,
                'status' => $status,
                'evidence' => $evidence,
                'ece' => $comp && $comp->eceNumber ? $comp->eceNumber->number : '',
                'component' => $comp && $comp->componentDetails ? $comp->componentDetails->component : '',
                'type' => $comp && $comp->componentDetails ? $comp->componentDetails->type : '',
                'part' => $comp && $comp->componentDetails ? $comp->componentDetails->part : '',
                'qty' => $comp && $comp->componentDetails ? $comp->componentDetails->qty : '',
                'document' => $comp && $comp->supportingDocument ? asset('storage/' . $comp->supportingDocument->document) : null,
                'image' => $comp && $comp->supportingImage ? asset('storage/' . $comp->supportingImage->image) : null
            ];
        }

        return view('pages.vehicles.report', compact('vehicle', 'vehicleInfo', 'categories', 'vehicleImages', 'partCategories', 'vehicleSuppliers', 'adrDataForFrontend', 'masterTemplateProcess'));
    }

    public function storeModelPart(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $cat = \App\Models\PartCategory::firstOrCreate(['category_name' => $request->category]);
        $comp = \App\Models\PartComponent::firstOrCreate(['component_name' => $request->component, 'category_id' => $cat->id]);

        $supplier = null;
        if ($request->supplier && $request->supplier !== 'N/A') {
            $supplier = \App\Models\Supplier::firstOrCreate(['business_name' => $request->supplier]);
        }

        $part = \App\Models\Part::create([
            'vehicle_id' => $id,
            'category_id' => $cat->id,
            'component_id' => $comp->id,
            'description' => $request->description,
            'part_number' => $request->part_number === 'N/A' ? null : $request->part_number,
            'price' => $request->price,
            'supplier_id' => $supplier ? $supplier->id : null,
        ]);

        $builds = \App\Models\VehicleModel::where('vehicle_id', $id)->get();
        $insertedBuildParts = [];
        if ($builds->count() > 0) {
            $now = now();
            $priceNum = $part->price ? (float)str_replace(['$', ','], '', $part->price) : 0;
            foreach ($builds as $build) {
                $bpId = \App\Models\VehicleBuildPart::insertGetId([
                    'vehicle_model_id' => $build->id,
                    'category' => $cat->category_name,
                    'component' => $comp->component_name,
                    'description' => $part->description,
                    'part_number' => $part->part_number,
                    'price' => $priceNum,
                    'supplier' => $supplier ? $supplier->business_name : 'N/A',
                    'status' => 'procurement',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
                
                $insertedBuildParts[] = [
                    'id' => $bpId,
                    'vehicle_model_id' => $build->id,
                    'category' => $cat->category_name,
                    'component' => $comp->component_name,
                    'description' => $part->description,
                    'part_number' => $part->part_number,
                    'price' => (string)$priceNum,
                    'supplier' => $supplier ? $supplier->business_name : 'N/A',
                    'status' => 'procurement'
                ];
            }
        }

        return response()->json([
            'id' => $part->id,
            'category' => $cat->category_name,
            'component' => $comp->component_name,
            'description' => $part->description,
            'part_number' => $part->part_number,
            'price' => $part->price,
            'supplier' => $supplier ? $supplier->business_name : null,
            'inserted_build_parts' => $insertedBuildParts
        ]);
    }

    public function destroyModelPart($id)
    {
        $part = \App\Models\Part::findOrFail($id);
        $part->delete();
        return response()->json(['success' => true]);
    }

    public function updateModelPart(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric',
            'part_number' => 'nullable|string'
        ]);
        $part = \App\Models\Part::findOrFail($id);
        $part->price = $request->price;
        $part->part_number = $request->part_number ?: 'N/A';
        $part->save();
        return response()->json([
            'success' => true,
            'price' => $part->price,
            'part_number' => $part->part_number
        ]);
    }

    public function storeBuild(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vin'  => 'nullable|string|max:255',
        ]);

        $vehicle = Vehicle::findOrFail($id);

        $build = $vehicle->builds()->create([
            'name' => $request->name,
            'vin'  => $request->vin,
        ]);

        // Copy BOM parts to this build under Procurement status
        $bomParts = \App\Models\Part::with(['category', 'component', 'supplier'])->where('vehicle_id', $vehicle->id)->get();
        $buildPartsToInsert = [];
        $now = now();
        foreach ($bomParts as $bp) {
            $price = $bp->price ? (float)str_replace(['$', ','], '', $bp->price) : 0;
            $buildPartsToInsert[] = [
                'vehicle_model_id' => $build->id,
                'category' => $bp->category ? $bp->category->category_name : 'Uncategorized',
                'component' => $bp->component ? $bp->component->component_name : 'N/A',
                'description' => $bp->description,
                'part_number' => $bp->part_number,
                'price' => $price,
                'supplier' => $bp->supplier ? $bp->supplier->business_name : 'N/A',
                'status' => 'procurement',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        if (!empty($buildPartsToInsert)) {
            \App\Models\VehicleBuildPart::insert($buildPartsToInsert);
        }

        // Load master template for this vehicle (stations → operations → steps, QC, signoffs)
        $masterStations = \App\Models\VehicleBuildStation::with([
            'operations.steps',
            'operations.qcChecks',
            'operations.signoffs',
        ])->where('vehicle_id', $vehicle->id)->orderBy('order')->get();

        $stepLogRows     = [];
        $qcLogRows       = [];
        $signoffLogRows  = [];
        $now = now();

        foreach ($masterStations as $station) {
            foreach ($station->operations as $operation) {
                // Seed one build_step_log per master step (unchecked by default)
                foreach ($operation->steps as $step) {
                    $stepLogRows[] = [
                        'vehicle_id'            => $vehicle->id,
                        'vehicle_model_id'      => $build->id,
                        'vehicle_build_step_id' => $step->id,
                        'is_completed'          => false,
                        'image_path'            => null,
                        'completed_by'          => null,
                        'completed_at'          => null,
                        'created_at'            => $now,
                        'updated_at'            => $now,
                    ];
                }

                // Seed one build_qc_log per QC check template (no result yet)
                foreach ($operation->qcChecks as $qc) {
                    $qcLogRows[] = [
                        'vehicle_id'             => $vehicle->id,
                        'vehicle_model_id'       => $build->id,
                        'operation_qc_check_id'  => $qc->id,
                        'status'                 => null,
                        'notes'                  => null,
                        'logged_by'              => null,
                        'logged_at'              => null,
                        'created_at'             => $now,
                        'updated_at'             => $now,
                    ];
                }

                // Seed one build_signoff_log per signoff role template (unsigned by default)
                foreach ($operation->signoffs as $signoff) {
                    $signoffLogRows[] = [
                        'vehicle_id'          => $vehicle->id,
                        'vehicle_model_id'    => $build->id,
                        'operation_signoff_id'=> $signoff->id,
                        'signed_by'           => null,
                        'signature_data'      => null,
                        'signed_at'           => null,
                        'created_at'          => $now,
                        'updated_at'          => $now,
                    ];
                }
            }
        }

        // Bulk insert for performance
        if (!empty($stepLogRows)) {
            \App\Models\BuildStepLog::insert($stepLogRows);
        }
        if (!empty($qcLogRows)) {
            \App\Models\BuildQcLog::insert($qcLogRows);
        }
        if (!empty($signoffLogRows)) {
            \App\Models\BuildSignoffLog::insert($signoffLogRows);
        }

        return redirect()->back()->with('success', 'Build added successfully.');
    }    public function updateBuild(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $build = \App\Models\VehicleModel::findOrFail($id);
        $build->update([
            'name' => $request->name,
        ]);

        return response()->json($build);
    }

    public function destroyBuild($id)
    {
        $build = \App\Models\VehicleModel::findOrFail($id);
        
        $build->parts()->delete();
        $build->timelineTasks()->delete();
        $build->buildStepLogs()->delete();
        $build->buildQcLogs()->delete();
        $build->buildSignoffLogs()->delete();
        $build->operationNotes()->delete();

        $build->delete();

        return response()->json(['success' => true]);
    }



    public function storeBuildPart(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string',
            'component' => 'required|string',
            'description' => 'nullable|string',
            'part_number' => 'nullable|string',
            'price' => 'nullable|numeric',
            'supplier' => 'nullable|string',
            'status' => 'required|string'
        ]);

        $build = \App\Models\VehicleModel::findOrFail($id);
        
        $part = $build->parts()->create([
            'category' => $request->category,
            'component' => $request->component,
            'description' => $request->description,
            'part_number' => $request->part_number,
            'price' => $request->price ?? 0,
            'supplier' => $request->supplier,
            'status' => $request->status,
        ]);

        return response()->json($part);
    }

    public function updateBuildPartStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $part = \App\Models\VehicleBuildPart::findOrFail($id);
        $part->update(['status' => $request->status]);

        return response()->json($part);
    }

    public function storeTimelineTask(Request $request, $id)
    {
        $task = \App\Models\VehicleBuildTimelineTask::create([
            'vehicle_model_id' => $id,
            'track' => $request->track,
            'phase' => $request->phase,
            'label' => $request->label,
            'cost' => $request->cost ?? 0,
            'start' => $request->start ?? 1,
            'dur' => $request->dur ?? 1,
        ]);

        return response()->json($task);
    }

    public function updateTimelineTask(Request $request, $id)
    {
        $task = \App\Models\VehicleBuildTimelineTask::findOrFail($id);
        $task->update($request->only(['track', 'phase', 'label', 'cost', 'start', 'dur']));

        return response()->json($task);
    }

    public function destroyTimelineTask($id)
    {
        $task = \App\Models\VehicleBuildTimelineTask::findOrFail($id);
        $task->delete();

        return response()->json(['success' => true]);
    }

    public function toggleStep(Request $request, $id, $stepId)
    {
        $status = \App\Models\BuildStepLog::updateOrCreate(
            ['vehicle_model_id' => $id, 'vehicle_build_step_id' => $stepId],
            ['is_completed' => $request->is_completed]
        );
        return response()->json(['success' => true]);
    }

    public function uploadStepImage(Request $request, $id, $stepId)
    {
        $request->validate(['image' => 'required|image']);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('steps', 'public');
            $status = \App\Models\BuildStepLog::updateOrCreate(
                ['vehicle_model_id' => $id, 'vehicle_build_step_id' => $stepId],
                ['image_path' => $path]
            );
            return response()->json(['success' => true, 'image_path' => $path]);
        }
        return response()->json(['success' => false], 400);
    }

    public function saveDataEntry(Request $request, $id, $stepId)
    {
        $status = \App\Models\BuildStepLog::updateOrCreate(
            ['vehicle_model_id' => $id, 'vehicle_build_step_id' => $stepId],
            ['data_entry_value' => $request->data_entry_value]
        );
        return response()->json(['success' => true]);
    }

    public function storeModelReportApproval(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        $data = $request->validate([
            'approval_pathway' => 'nullable|string',
            'rav_entry_reference' => 'nullable|string',
            'approval_date' => 'nullable|date',
            'department_reference' => 'nullable|string',
            'certificate' => 'nullable|file'
        ]);

        if ($request->hasFile('certificate')) {
            $data['certificate_file_path'] = $request->file('certificate')->store('rav_certificates', 'public');
        }
        unset($data['certificate']);

        $approval = $vehicle->modelReportApprovals()->create($data);

        return response()->json([
            'success' => true,
            'approval' => [
                'id' => $approval->id,
                'approval_pathway' => $approval->approval_pathway,
                'rav_entry_reference' => $approval->rav_entry_reference,
                'approval_date' => $approval->approval_date,
                'department_reference' => $approval->department_reference,
                'certificate_url' => $approval->certificate_file_path ? asset('storage/' . $approval->certificate_file_path) : null,
            ]
        ]);
    }

    public function destroyModelReportApproval($id)
    {
        $approval = ModelReportApproval::findOrFail($id);
        
        if ($approval->certificate_file_path) {
            Storage::disk('public')->delete($approval->certificate_file_path);
        }
        
        $approval->delete();
        
        return redirect()->back()->with('success', 'Approval record deleted successfully.');
    }
}
