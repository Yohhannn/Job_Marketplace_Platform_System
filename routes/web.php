<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignUp_ClientController;
use App\Http\Controllers\SignUp_TalentController;
use App\Http\Controllers\LogInController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LogInController::class, 'show'])->name('login');
Route::get('/signup', [SignUpController::class, 'show'])->name('signup');

// Client Registration Routes
Route::controller(SignUp_ClientController::class)->group(function () {
    Route::get('/signup/client', 'show')->name('client.register.show');
    Route::post('/signup/client', 'store')->name('client.register');
});

// Talent Registration Routes
Route::controller(SignUp_TalentController::class)->group(function () {
    Route::get('/register/talent', [SignUp_TalentController::class, 'show'])->name('talent.register.show');
    Route::post('/register/talent', [SignUp_TalentController::class, 'store'])->name('talent.register');
});
