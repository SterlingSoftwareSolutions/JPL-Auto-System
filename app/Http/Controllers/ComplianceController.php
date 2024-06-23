<?php

namespace App\Http\Controllers;
use App\Models\ADR;
use Illuminate\Http\Request;

class ComplianceController extends Controller
{
    public function showComplianceForm()
    {
        $adrData = ADR::all(); // 
        return view('pages.productionsystem.compliancepage', compact('adrData'));
    }
}
