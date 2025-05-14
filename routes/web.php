<?php

use App\Http\Controllers\DeliverWorkController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignUp_ClientController;
use App\Http\Controllers\SignUp_TalentController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LogInController::class, 'show'])->name('login');
Route::post('/login', [LogInController::class, 'signIn'])->name('auth');


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

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'show'])->name('home');

    //Find Work
    Route::get('/find-work/my-job-posts', [JobPostController::class, 'myJobPosts'])
        ->name('findwork.myjobposts');
    Route::get('/find-work/my-job-posts/create-job-post', [JobPostController::class, 'createJobPost'])
        ->name('createjobpost.createjobpost');
    Route::get('/find-work/my-proposals', [ProposalController::class, 'myProposals'])
        ->name('findwork.myproposals');

    //Deliver Work
    Route::get('/deliver-work/active-contracts', [DeliverWorkController::class, 'activeContracts'])
        ->name('deliverwork.activecontracts');
    Route::get('/deliver-work/contact-history', [DeliverWorkController::class, 'historyContracts'])
        ->name('deliverwork.historycontracts');
});

