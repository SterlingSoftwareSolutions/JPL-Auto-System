<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\PartCategory;
use App\Models\PartComponent;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index(){

        $categories = PartCategory::all();
        $components = PartComponent::all();


        return view('pages.productionsystem.partlistpage', compact('categories', 'components'));

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
            $partslist->supplier = $request->supplier;


            $partslist->save();

        return redirect()->route('partlistpage');







    }
}
