<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function savepartlist(Request $request)
    {
        // dd($request);
        // Validate incoming request data
        $validatedData = $request->validate([

            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB per file
        ]);

        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image'); // Get the single file
            $imageName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_images', $imageName, 'public');
            $imagePath = $filePath; // Store the path in a single variable
        }

        // dd($imagePath);

        $partslist  = new Supplier();

        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image'); // Get the single file
            $imageName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_images', $imageName, 'public');
            $imagePath = $filePath; // Store the path in a single variable
        }
        // dd($imagePath);

        // DB NAME                              REQUEST NAME
        $partslist->upload_image =   $imageName;
        $partslist->business_name = $request->business_name;
        $partslist->business_web = $request->business_web;
        $partslist->country = $request->country;
        $partslist->contact_name = $request->contact_name;
        $partslist->contact_name = $request->contact_name;
        $partslist->phone = $request->phone;
        $partslist->email = $request->email;
        $partslist->trade_account = $request->trade_account === 'yes' ? true : false;
        $partslist->trade_agreement_pdf = $request->trade_agreement_pdf;
        $partslist->supplier_crm = $request->supplier_crm === 'yes' ? true : false;
        $partslist->crm_url = $request->crm_url;
        $partslist->crm_username = $request->crm_username;
        $partslist->crm_password = $request->crm_password;

        // dd($post);
        $partslist->save();



        // Fetch all suppliers from the database

        // dd($suppliers);

        return redirect()->route('supplierspage');
    }


    public function getsupplier(Request $request){

        $suppliers = Supplier::all();

         return view('pages.productionsystem.supplierspage' , compact('suppliers'));


    }



}
