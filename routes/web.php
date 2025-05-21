<?php

use App\Http\Controllers\DeliverWorkController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignUp_UserController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LogInController::class, 'show'])->name('login');
Route::post('/login', [LogInController::class, 'signIn'])->name('auth');
Route::post('/logout', [LogInController::class, 'logOut'])->name('logout');
Route::get('/signup', [SignUpController::class, 'show'])->name('signup');

// User Registration Routes
Route::controller(SignUp_UserController::class)->group(function () {
    Route::get('/registertration', [SignUp_UserController::class, 'show'])->name('user.register.show');
    Route::post('/register/user', [SignUp_UserController::class, 'store'])->name('user.register');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'show'])->name('home');
    Route::post('/job-post/create', [JobPostController::class, 'createJob'])->name('createJob');

    //Find Work
    Route::get('/find-work/my-job-posts', [JobPostController::class, 'myJobPosts'])
        ->name('findwork.myjobposts');
    Route::get('/find-work/my-job-posts/create-job-post', [JobPostController::class, 'createJobPost'])
        ->name('createjobpost.createjobpost');
    Route::get('/my-post-details', [JobPostController::class, 'myPostDetails'])
        ->name('my-post-details');
    Route::get('/find-work/other-job-posts', [JobPostController::class, 'otherPostDetails'])
        ->name('other-post-details');
    Route::get('/find-work/my-proposals', [ProposalController::class, 'myProposals'])
        ->name('findwork.myproposals');
    Route::get('/find-work/make-proposal',[ProposalController::class, 'makeProposal'])
        ->name('makeproposal');
    Route::post('/find-work/submit-proposal', [ProposalController::class, 'submitProposal'])
        ->name('submit_proposal');
    Route::get('/find-work/proposal-details',[ProposalController::class, 'proposalDetails'])
        ->name('proposaldetails');
    Route::patch('/proposal/interview/{proposal}', [ProposalController::class, 'scheduleInterview'])
        ->name('proposal.interview');

    // Show proposer's full info
    Route::get('/user/proposer/{user_id}/job/{job_id}', [JobPostController::class, 'showProposerInfo'])
        ->name('user.proposer-info');

    // Reject a proposal
    Route::patch('/proposal/{proposal}/reject', [ProposalController::class, 'reject'])
        ->name('proposal.reject');
    Route::patch('/proposal/{proposal}/hire', [ProposalController::class, 'hire'])
        ->name('proposal.hire');

    //Deliver Work
    Route::get('/deliver-work/active-contracts', [DeliverWorkController::class, 'activeContracts'])
        ->name('deliverwork.activecontracts');
    Route::get('/deliver-work/contact-history', [DeliverWorkController::class, 'historyContracts'])
        ->name('deliverwork.historycontracts');
    Route::get('/deliver-work/active-contracts/contract-info/review', [DeliverWorkController::class, 'viewContractReview'])
        ->name('deliverwork.viewcontractreview');

    //Profile
    Route::get('/profile', [ProfileController::class, 'myProfile'])
        ->name('myProfile');
    Route::get('/profile/profile-settings', [ProfileController::class, 'myProfileSettings'])
        ->name('myProfileSettings');
    Route::put('/profile/profile-settings', [ProfileController::class, 'updateProfileSettings'])
        ->name('updateProfileSettings');
    Route::get('/profile/profile-contact', [ProfileController::class, 'myProfileContact'])
        ->name('myProfileContact');

    //Jobs
    Route::put('/profile/profile-contact', [ProfileController::class, 'updateProfileContact'])
        ->name('updateProfileContact');
    Route::put('/profile/profile-contact/change-password', [ProfileController::class, 'changePassword'])
        ->name('changePassword');

    // Contracts
    Route::get('/contract/{contract_id}/review', [DeliverWorkController::class, 'showReviewForm'])
        ->name('contract.review');
    Route::patch('/contract/{contract_id}/end', [DeliverWorkController::class, 'endContract'])
        ->name('contract.end');
});
