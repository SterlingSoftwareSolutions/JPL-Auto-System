<?php

namespace App\Http\Controllers;
use App\Models\ADR;
use App\Models\Compliance;
use App\Models\EvidenceType;
use App\Models\EceNumber;
use App\Models\ComponentDetail;
use App\Models\SystemStatus;
use App\Models\SupportingDocument;
use App\Models\SupportingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplianceController extends Controller
{
    public function showComplianceForm()
    {
        $adrData = ADR::paginate(5); //
        return view('pages.productionsystem.compliancepage', compact('adrData'));
    }

    public function updateVehicleCompliance(Request $request, $vehicle_id)
    {
        $request->validate([
            'adr_id' => 'required|exists:adr,id',
            'status' => 'required|string',
            'evidence' => 'array',
            'ece' => 'nullable|string',
            'component' => 'nullable|string',
            'type' => 'nullable|string',
            'part' => 'nullable|string',
            'qty' => 'nullable|string',
            'document' => 'nullable|file',
            'image' => 'nullable|file|image',
        ]);

        $compliance = Compliance::firstOrNew([
            'vehicle_id' => $vehicle_id,
            'adr_id' => $request->adr_id
        ]);
        
        $adr = ADR::find($request->adr_id);
        $compliance->title = $adr->title;
        $compliance->compliancetext = $compliance->compliancetext ?? 'Pending';
        $compliance->adr_requirements_id = $compliance->adr_requirements_id ?? 1;

        // Evidence Type
        $evidence = $request->evidence ?? [];
        if ($compliance->evidence_type_id) {
            EvidenceType::where('id', $compliance->evidence_type_id)->update([
                'ece' => in_array('ece', $evidence),
                'test' => in_array('test', $evidence),
                'cta' => in_array('cta', $evidence)
            ]);
        } else {
            $evType = EvidenceType::create([
                'ece' => in_array('ece', $evidence),
                'test' => in_array('test', $evidence),
                'cta' => in_array('cta', $evidence)
            ]);
            $compliance->evidence_type_id = $evType->id;
        }

        // ECE Number
        if ($compliance->ece_number_id) {
            EceNumber::where('id', $compliance->ece_number_id)->update(['number' => $request->ece]);
        } else {
            $eceNum = EceNumber::create(['number' => $request->ece]);
            $compliance->ece_number_id = $eceNum->id;
        }

        // Component Detail
        if ($compliance->component_details_id) {
            ComponentDetail::where('id', $compliance->component_details_id)->update([
                'component' => $request->component,
                'type' => $request->type,
                'part' => $request->part,
                'qty' => $request->qty
            ]);
        } else {
            $compDet = ComponentDetail::create([
                'component' => $request->component,
                'type' => $request->type,
                'part' => $request->part,
                'qty' => $request->qty
            ]);
            $compliance->component_details_id = $compDet->id;
        }

        // Supporting Document
        if ($request->hasFile('document')) {
            $docPath = $request->file('document')->store('compliance_documents', 'public');
            if ($compliance->supporting_document_id) {
                SupportingDocument::where('id', $compliance->supporting_document_id)->update(['document' => $docPath]);
            } else {
                $doc = SupportingDocument::create(['document' => $docPath]);
                $compliance->supporting_document_id = $doc->id;
            }
        }

        // Supporting Image
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('compliance_images', 'public');
            if ($compliance->supporting_images_id) {
                SupportingImage::where('id', $compliance->supporting_images_id)->update(['image' => $imgPath]);
            } else {
                $img = SupportingImage::create(['image' => $imgPath]);
                $compliance->supporting_images_id = $img->id;
            }
        }

        // System Status
        if ($compliance->system_status_id) {
            SystemStatus::where('id', $compliance->system_status_id)->update(['status' => ucfirst($request->status)]);
        } else {
            $sysStat = SystemStatus::create(['status' => ucfirst($request->status)]);
            $compliance->system_status_id = $sysStat->id;
        }

        $compliance->save();

        return response()->json([
            'success' => true,
            'document_url' => $compliance->supportingDocument ? Storage::url($compliance->supportingDocument->document) : null,
            'image_url' => $compliance->supportingImage ? Storage::url($compliance->supportingImage->image) : null
        ]);
    }
}
