<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //login
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
