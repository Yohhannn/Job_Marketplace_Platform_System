<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignUp_ClientController;
use App\Http\Controllers\SignUp_TalentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [SignUpController::class, 'show'])->name('signup');

Route::controller(SignUp_ClientController::class)->group(function () {
    Route::get('/signup/client', 'show')->name('client.register.show');
    Route::post('/signup/client', 'store')->name('client.register');
});

Route::get('/signup/talent', [SignUp_TalentController::class, 'show'])->name('signup_talent');
