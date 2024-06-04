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
        //dd( $request);
        $request->validate([
            //'email' => 'required|email',
            'pin1' => 'required',
            'pin2' => 'required',
            'pin3' => 'required',
            'pin4' => 'required',
        ]);

        $credentials = [
            'pin1' => $request->pin1,
            'pin2' => $request->pin2,
            'pin3' => $request->pin3,
            'pin4' => $request->pin4,
        ];

        // Find the user by email and compare individual PIN columns
        $user = User::where('pin1', $request->pin1)
                    ->where('pin2', $request->pin2)
                    ->where('pin3', $request->pin3)
                    ->where('pin4', $request->pin4)
                    ->first();

        //dd($user);
        if ($user) {
            Auth::login($user); // Use Auth::login for successful login
            return redirect('/wel')->with('success', 'Login Successful');
        } else {
            return redirect('/')->with('error', 'Invalid email or password.');
        }
    }

    //log out
    public function logout()
    {
        //dd("logout");
        Auth::logout();

        return redirect('/');
    }
}
