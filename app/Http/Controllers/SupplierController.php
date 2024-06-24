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
        if (!$request->supplier_id) {
            // This block is for creating a new supplier

            // Validate incoming request data
            // $validatedData = $request->validate([
            //     'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB per file
            //     'trade_agreement_pdf' => 'required|file|mimes:pdf|max:2048',
            //     'business_name' => 'required|string|max:255',
            //     'business_web' => 'nullable|string|max:255',
            //     'country' => 'nullable|string|max:255',
            //     'contact_name' => 'nullable|string|max:255',
            //     'phone' => 'nullable|string|max:255',
            //     'email' => 'nullable|string|email|max:255',
            //     'trade_account' => 'nullable|string|in:yes,no',
            //     'supplier_crm' => 'nullable|string|in:yes,no',
            //     'crm_url' => 'nullable|string|max:255',
            //     'crm_username' => 'nullable|string|max:255',
            //     'crm_password' => 'nullable|string|max:255',
            // ]);

            $partslist = new Supplier();

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $imageName = time() . '-' . $file->getClientOriginalName();
                $filePath = $file->storeAs('profile_images', $imageName, 'public');
                $partslist->upload_image = $imageName;
            }

            // Handle trade agreement PDF upload
            if ($request->hasFile('trade_agreement_pdf')) {
                $pdf = $request->file('trade_agreement_pdf');
                $pdfName = time() . '-' . $pdf->getClientOriginalName();
                $pdfPath = $pdf->storeAs('trade_agreement_pdfs', $pdfName, 'public');
                $partslist->trade_agreement_pdf = $pdfPath;
            }

            // Assign other fields
            $partslist->business_name = $request->business_name;
            $partslist->business_web = $request->business_web;
            $partslist->country = $request->country;
            $partslist->contact_name = $request->contact_name;
            $partslist->phone = $request->phone;
            $partslist->email = $request->email;
            $partslist->trade_account = $request->trade_account === 'yes';
            $partslist->supplier_crm = $request->supplier_crm === 'yes';
            $partslist->crm_url = $request->crm_url;
            $partslist->crm_username = $request->crm_username;
            $partslist->crm_password = $request->crm_password;

            // Save the new supplier record
            $partslist->save();

        } else {
            // This block is for updating an existing supplier

            // Find the supplier by ID
            $supplier = Supplier::findOrFail($request->supplier_id);

            // Validate incoming request data for update
            // $validatedData = $request->validate([
            //     'business_name' => 'required|string|max:255',
            //     'business_web' => 'nullable|string|max:255',
            //     'country' => 'nullable|string|max:255',
            //     'contact_name' => 'nullable|string|max:255',
            //     'phone' => 'nullable|string|max:255',
            //     'email' => 'nullable|string|email|max:255',
            //     'trade_account' => 'nullable|string|in:yes,no',
            //     'supplier_crm' => 'nullable|string|in:yes,no',
            //     'crm_url' => 'nullable|string|max:255',
            //     'crm_username' => 'nullable|string|max:255',
            //     'crm_password' => 'nullable|string|max:255',
            // ]);

            // Update the supplier fields
            $supplier->business_name = $request->business_name;
            $supplier->business_web = $request->business_web;
            $supplier->country = $request->country;
            $supplier->contact_name = $request->contact_name;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->trade_account = $request->trade_account === 'yes';
            $supplier->supplier_crm = $request->supplier_crm === 'yes';
            $supplier->crm_url = $request->crm_url;
            $supplier->crm_username = $request->crm_username;
            $supplier->crm_password = $request->crm_password;

            // Handle profile image update if provided
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $imageName = time() . '-' . $file->getClientOriginalName();
                $filePath = $file->storeAs('profile_images', $imageName, 'public');
                $supplier->upload_image = $imageName;
            }

            // Handle trade agreement PDF update if provided
            if ($request->hasFile('trade_agreement_pdf')) {
                $pdf = $request->file('trade_agreement_pdf');
                $pdfName = time() . '-' . $pdf->getClientOriginalName();
                $pdfPath = $pdf->storeAs('trade_agreement_pdfs', $pdfName, 'public');
                $supplier->trade_agreement_pdf = $pdfPath;
            }

            // Save the updated supplier record
            $supplier->save();
        }



        return redirect()->route('supplierspage');
    }


    public function getsupplier(Request $request){

        $suppliers = Supplier::all();

         return view('pages.productionsystem.supplierspage' , compact('suppliers'));


    }


    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);

        return response()->json($supplier);
    }

    public function update(Request $request, $id)
    {
               dd($request->all());

        $supplier = Supplier::findOrFail($id);

        $validatedData = $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'trade_agreement_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $imageName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_images', $imageName, 'public');
            $supplier->upload_image = $imageName;
        }

        if ($request->hasFile('trade_agreement_pdf')) {
            $pdf = $request->file('trade_agreement_pdf');
            $pdfName = time() . '-' . $pdf->getClientOriginalName();
            $pdf_Path = $pdf->storeAs('trade_agreement_pdfs', $pdfName, 'public');
            $supplier->trade_agreement_pdf = $pdf_Path;
        }

        $supplier->business_name = $request->business_name;
        $supplier->business_web = $request->business_web;
        $supplier->country = $request->country;
        $supplier->contact_name = $request->contact_name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->trade_account = $request->trade_account === 'yes' ? true : false;
        $supplier->supplier_crm = $request->supplier_crm === 'yes' ? true : false;
        $supplier->crm_url = $request->crm_url;
        $supplier->crm_username = $request->crm_username;
        $supplier->crm_password = $request->crm_password;

        $supplier->update();

        return redirect()->route('supplierspage')->with('success', 'Supplier updated successfully.');
    }


    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        // dd($supplier);

        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier deleted successfully.');
    }



}
