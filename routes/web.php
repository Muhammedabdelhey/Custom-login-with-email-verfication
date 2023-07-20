<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Registre;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(Login::class)->group(function () {
    Route::get('/', 'login');
    Route::post('login', 'loginRequest');
    Route::get('logout', 'logout');
});
Route::controller(Registre::class)->group(function () {
    Route::get('Register', 'register');
    Route::post('RegisterRequest', 'registerRequest');
    Route::get('verify/{email}', 'verifyEmail');
    Route::get('sendVerifyMail/{email}', 'sendVerifyMail');
    Route::get('ResetpasswordMail/{email}', 'sendResetPasswordMail');
    Route::get('Resetpassword/{email}', 'resetPassword');
    Route::post('updatepassword', 'updatePassword');
});

Route::get('home', function () {
    return view('home');
})->middleware(['auth', 'verifyiedmail']);

Route::get('verification', function () {
    return view('Auth.verification');
});

