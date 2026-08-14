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
            'builds.buildStepStatuses',
            'modelReportApprovals'
        ])->findOrFail($id);

        foreach ($vehicle->builds as $build) {
            $stations = \App\Models\VehicleBuildStation::with(['operations' => function($q) use ($build) {
                $q->whereNull('vehicle_model_id')->orWhere('vehicle_model_id', $build->id)->orderBy('order');
            }, 'operations.steps' => function($q) use ($build) {
                $q->whereNull('vehicle_model_id')->orWhere('vehicle_model_id', $build->id)->orderBy('order');
            }])->whereNull('vehicle_model_id')->orWhere('vehicle_model_id', $build->id)->orderBy('order')->get();

            $statuses = $build->buildStepStatuses->keyBy('vehicle_build_step_id');
            
            foreach ($stations as $station) {
                foreach ($station->operations as $operation) {
                    foreach ($operation->steps as $step) {
                        if ($statuses->has($step->id)) {
                            $status = $statuses->get($step->id);
                            $step->is_completed = $status->is_completed;
                            $step->image_path = $status->image_path;
                        } else {
                            $step->is_completed = false;
                            $step->image_path = null;
                        }
                    }
                }
            }
            
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

        return view('pages.vehicles.report', compact('vehicle', 'vehicleInfo', 'categories', 'vehicleImages', 'partCategories', 'vehicleSuppliers', 'adrDataForFrontend'));
    }

    public function storeBuild(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vin' => 'nullable|string|max:255',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        
        $build = $vehicle->builds()->create([
            'name' => $request->name,
            'vin' => $request->vin,
        ]);

        // Global seeding is separate.

        return redirect()->back()->with('success', 'Build added successfully.');
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
        $status = \App\Models\VehicleBuildStepStatus::updateOrCreate(
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
            $status = \App\Models\VehicleBuildStepStatus::updateOrCreate(
                ['vehicle_model_id' => $id, 'vehicle_build_step_id' => $stepId],
                ['image_path' => $path]
            );
            return response()->json(['success' => true, 'image_path' => $path]);
        }
        return response()->json(['success' => false], 400);
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
