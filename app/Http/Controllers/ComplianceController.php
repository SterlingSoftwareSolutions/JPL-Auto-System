<?php

namespace App\Http\Controllers;
use App\Models\ADR;
use App\Models\ADRRequirments;
use App\Models\Compliance;
use App\Models\ComponentsDetails;
use App\Models\ECENumber;
use App\Models\EvidenceType;
use App\Models\SupportingDocuments;
use App\Models\SupportingImages;
use App\Models\SystemStatus;
use Illuminate\Http\Request;

class ComplianceController extends Controller
{
    public function showComplianceForm()
    {
        $adrData = ADR::paginate(5); //
        return view('pages.productionsystem.compliancepage', compact('adrData'));
    }

    public function storeCompliance(Request $request)
    {
        //dd($request);

        $adr = ADR::find($request->adr_id);

        $evidenceType = EvidenceType::create([
            'ece' => $request->has('ece'),
            'test' => $request->has('test'),
            'cta' => $request->has('cta')
        ]);
        //dd($evidenceType);
        $eceNumber = ECENumber::create([
            'number' => $request->input('number')
        ]);

        // $supportingDocument = SupportingDocuments::create([
        //     'document' => $request->input('document')
        // ]);

        // $supportingImage = SupportingImages::create([
        //     'image' => $request->input('image')
        // ]);

        $componentDetail = ComponentsDetails::create([
            'component' => $request->input('component'),
            'type' => $request->input('type'),
            'part' => $request->input('part'),
            'qty' => $request->input('qty')
        ]);

        $systemStatus = SystemStatus::create([
            'status' => $request->input('status')
        ]);

        $adrRequirement = ADRRequirments::create([
            'required' => $request->has('qty')
        ]);

        $compliance = Compliance::create([
            'title' => $adr->title,
            'compliancetext' => $adr->compliancetext,
            'adr_id' => $request->input('adr_id'),
            'evidence_type_id' => $evidenceType->id,
            'ece_number_id' => $eceNumber->id,
            // 'supporting_document_id' => $supportingDocument->id,
            // 'supporting_images_id' => $supportingImage->id,
            'component_details_id' => $componentDetail->id,
            'system_status_id' => $systemStatus->id,
            'adr_requirements_id' => $adrRequirement->id,
        ]);
        //dd($compliance);
        return redirect()->back()->with('success', 'Compliance data saved successfully');
    }
}
