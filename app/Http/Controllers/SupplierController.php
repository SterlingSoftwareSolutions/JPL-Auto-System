<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function savepartlist(Request $request)
    {

        dd($request);
        $validator = Validator::make($request->all(), [
            // 'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'trade_agreement_pdf' => 'required|file|mimes:pdf|max:2048',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

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

        $partslist->save();

        return response()->json(['success' => 'Supplier has been successfuly added'], 200);
    }

    public function update(Supplier $supplier, Request $request )
    {
        $validator = Validator::make($request->all(), [
            // 'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'trade_agreement_pdf' => 'required|file|mimes:pdf|max:2048',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }



        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image'); // Get the single file
            $imageName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profile_images', $imageName, 'public');
            $imagePath = $filePath;
            $supplier->upload_image = $imageName;
        }

        if ($request->hasFile('trade_agreement_pdf')) {
            $pdf = $request->file('trade_agreement_pdf'); // Get the single file
            $pdfName = time() . '-' . $pdf->getClientOriginalName();
            $pdf_Path = $pdf->storeAs('trade_agreement_pdfs', $pdfName, 'public');
            $trade_agreement_path = $pdf_Path;
            $supplier->trade_agreement_pdf =   $trade_agreement_path;
        }


        $supplier->business_name = $request->business_name;
        $supplier->business_web = $request->business_web;
        $supplier->country = $request->country;
        $supplier->contact_name = $request->contact_name;
        $supplier->contact_name = $request->contact_name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->trade_account = $request->trade_account === 'yes' ? true : false;
        $supplier->supplier_crm = $request->supplier_crm === 'yes' ? true : false;
        $supplier->crm_url = $request->crm_url;
        $supplier->crm_username = $request->crm_username;
        $supplier->crm_password = $request->crm_password;

        $supplier->save();

        return response()->json(['success' => 'Supplier has been successfuly updated'], 200);
    }


    public function getsupplier(Request $request){

        $suppliers = Supplier::all();

         return view('pages.productionsystem.supplierspage' , compact('suppliers'));


    }

    public function create()
    {
        $view = view('components.supplier_model', ['supplier' => null, 'action' => route('storagesupplier')])->render();
        return response()->json(['html' => $view]);

    }


    public function show(Supplier $supplier)
    {
        $view = view('components.supplier_model', ['supplier' => $supplier, 'action' => route('updatesupplier', $supplier->id)])->render();
        return response()->json(['html' => $view]);

    }


    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        // dd($supplier);

        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier deleted successfully.');
    }



}
