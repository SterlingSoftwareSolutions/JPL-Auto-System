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
        })->with('category')->get();
        // dd($bodyParts);

        // foreach ($bodyParts as $part) {
        //     // dd( $part->category->category_name);
        // }

        $labourParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Labour');
        })->get();

        // Repeat for other categories
        $powerPlantParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Power Plant');
        })->get();

        $suspensionParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Suspension');
        })->get();

        $wheelsTyresParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Wheels & Tyres');
        })->get();

        $interiorParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Interior');
        })->get();

        $exteriorParts = Part::whereHas('category', function($query) {
            $query->where('category_name', 'Exterior');
        })->get();

        return view('pages.productionsystem.partlistpage', compact(
            'categories', 'components', 'bodyParts', 'labourParts',
            'powerPlantParts', 'suspensionParts', 'wheelsTyresParts',
            'interiorParts', 'exteriorParts'
        ));
    }


    public function addpart(Request $request){
        // dd($request);

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
}
