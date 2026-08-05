<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //sign in view
    public function login_form()
    {
        return view('auth.signin');
    }

    //sign in
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pin1' => 'required',
            'pin2' => 'required',
            'pin3' => 'required',
            'pin4' => 'required',
        ]);

        $user = User::where('name', $request->name)
                    ->where('pin1', $request->pin1)
                    ->where('pin2', $request->pin2)
                    ->where('pin3', $request->pin3)
                    ->where('pin4', $request->pin4)
                    ->first();

        if ($user) {
            Auth::login($user);

            return redirect('/dashboard')
                ->with('success', 'Login Successful');
        }

        return redirect('/')
            ->with('error', 'Invalid name or PIN.');
    }

    //log out
    public function logout()
    {
        //dd("logout");
        Auth::logout();

        return redirect('/');
    }
}
