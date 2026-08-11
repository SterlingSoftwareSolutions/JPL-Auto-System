<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VehicleInformation;
use App\Models\SpecificationCategory;
use App\Models\VehicleImage;

class VehicleDetailsController extends Controller
{
    public function index()
    {
        $vehicleInfo = VehicleInformation::all();
        $categories = SpecificationCategory::with('specifications')->get();
        
        // Fetch vehicle images (using vehicle_id = 1 as default prototype ID)
        $vehicleImages = VehicleImage::where('vehicle_id', 1)->get()->keyBy('figure_number');

        return view('pages.productionsystem.vehicledetailspage', compact('vehicleInfo', 'categories', 'vehicleImages'));
    }
}
