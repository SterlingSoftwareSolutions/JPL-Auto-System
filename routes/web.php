<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
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


//auth routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('forget-password', [MailController::class, 'forgetpassword'])->name('forget-password');
Route::get('reset-password', [MailController::class, 'resetpassword'])->name('reset-password');
Route::get('reset-password-page/{token}', [MailController::class, 'resetpasswordpage'])->name('reset-password-page');
Route::post('reset', [MailController::class, 'reset'])->name('reset');




Route::get('/forget-password', function () {
    return view('auth.forgetpassword');
})->name('forget-password');


Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');


Route::get('/vehicle-details', function () {
    return view('pages.vehicledetailspage');
})->name('vehicledetailspage');


Route::get('/working-structions', function () {
    return view('pages.workingstructions');
})->name('workingstructions');


Route::get('/compliance', function () {
    return view('pages.compliancepage');
})->name('compliancepage');


Route::get('/partslist', function () {
    return view('pages.partlistpage');
})->name('partlistpage');


Route::get('/suppliers', function () {
    return view('pages.supplierspage');
})->name('supplierspage');


// Route::get('/engine-performance', function () {
//     return view('pages.vehicaldetailspage.engine-performance');
// })->name('engine-performance');
