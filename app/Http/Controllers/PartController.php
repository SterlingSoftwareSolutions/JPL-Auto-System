<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\PartCategory;
use App\Models\PartComponent;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $categories = PartCategory::all();
        $components = PartComponent::all();


        $bodyParts = Part::whereHas('category', function ($query) {
            $query->where('category_name', 'Body');

        })
        ->with(['category', 'component'])
        ->join('part_components', 'parts.component_id', '=', 'part_components.id')
        ->orderBy('part_components.component_name', 'asc')
        ->select('parts.*') // To avoid ambiguity and select only parts columns
        ->get();

        $labourParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Labour');

        })
        ->with(['category', 'component'])
        ->join('part_components', 'parts.component_id', '=', 'part_components.id')
        ->orderBy('part_components.component_name', 'asc')
        ->select('parts.*') // To avoid ambiguity and select only parts columns
        ->get();


        // Repeat for other categories
        $powerPlantParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Power Plants');
        })
        ->with(['category', 'component'])
        ->join('part_components', 'parts.component_id', '=', 'part_components.id')
        ->orderBy('part_components.component_name', 'asc')
        ->select('parts.*') // To avoid ambiguity and select only parts columns
        ->get();


        $suspensionParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Suspenstion');
        })
        ->with(['category', 'component'])
        ->join('part_components', 'parts.component_id', '=', 'part_components.id')
        ->orderBy('part_components.component_name', 'asc')
        ->select('parts.*') // To avoid ambiguity and select only parts columns
        ->get();

        $wheelsTyresParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Wheels & Tyres');
        })
        ->with(['category', 'component'])
        ->join('part_components', 'parts.component_id', '=', 'part_components.id')
        ->orderBy('part_components.component_name', 'asc')
        ->select('parts.*') // To avoid ambiguity and select only parts columns
        ->get();

        $interiorParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Interior');
        })
        ->with(['category', 'component'])
        ->join('part_components', 'parts.component_id', '=', 'part_components.id')
        ->orderBy('part_components.component_name', 'asc')
        ->select('parts.*') // To avoid ambiguity and select only parts columns
        ->get();

        $exteriorParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Exterior');
        })
        ->with(['category', 'component'])
        ->join('part_components', 'parts.component_id', '=', 'part_components.id')
        ->orderBy('part_components.component_name', 'asc')
        ->select('parts.*') // To avoid ambiguity and select only parts columns
        ->get();

        return view('pages.productionsystem.partlistpage', compact(
            'categories', 'components', 'bodyParts', 'labourParts',
            'powerPlantParts', 'suspensionParts', 'wheelsTyresParts',
            'interiorParts', 'exteriorParts'
        ));
    }


    public function addpart(Request $request){


        $partslist = new Part();

          if ($request->hasFile('uploadpartimage')) {
                $file = $request->file('uploadpartimage');
                $uploadPartImage = time() . '-' . $file->getClientOriginalName();
                $filePath = $file->storeAs('PartImages', $uploadPartImage, 'public');
                $partslist->upload_part_image = $uploadPartImage;
            }

            $partslist->category_id = $request->category;
            $partslist->component_id = $request->component;
            $partslist->description = $request->description;
            $partslist->part_number = $request->partnumber;
            $partslist->price = $request->price;
            $partslist->supplier = $request->supplier;


            $partslist->save();

        return redirect()->route('partlistpage');


    }



    public function getComponentsByCategory($categoryId)
{
    $components = PartComponent::where('category_id', $categoryId)->get();
    return response()->json($components);
}
}
