<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.signin');
});



Route::get('/wel', function () {
    return view('welcome');
});


Route::get('/forget-password', function () {
    return view('auth.forgetpassword');
})->name('forget-password');


Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');
