<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function savepartlist(Request $request)
    {
        // dd($request->all());
        // Validate incoming request data
        $validatedData = $request->validate([

            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB per fil
            'trade_agreement_pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        $partslist  = new Supplier();


        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image'); // Get the single file
            $imageName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_images', $imageName, 'public');
            $imagePath = $filePath;
            $partslist->upload_image = $imageName;
        }

        if ($request->hasFile('trade_agreement_pdf')) {
            $pdf = $request->file('trade_agreement_pdf'); // Get the single file
            $pdfName = time() . '-' . $pdf->getClientOriginalName();
            $pdf_Path = $pdf->storeAs('trade_agreement_pdfs', $pdfName, 'public');
            $trade_agreement_path = $pdf_Path;
            $partslist->trade_agreement_pdf =   $trade_agreement_path;
        }


        $partslist->business_name = $request->business_name;
        $partslist->business_web = $request->business_web;
        $partslist->country = $request->country;
        $partslist->contact_name = $request->contact_name;
        $partslist->contact_name = $request->contact_name;
        $partslist->phone = $request->phone;
        $partslist->email = $request->email;
        $partslist->trade_account = $request->trade_account === 'yes' ? true : false;
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


    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        // dd($supplier);

        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier deleted successfully.');
    }



}
