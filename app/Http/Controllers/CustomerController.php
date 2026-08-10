<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = \App\Models\Customer::orderBy('created_at', 'desc')->get();
        return view('pages.customersystem.customerlist', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'interest_level' => 'required|in:Low,Medium,High',
        ]);

        \App\Models\Customer::create($request->all());

        return redirect()->route('customerlist')->with('success', 'Customer added successfully!');
    }
}
