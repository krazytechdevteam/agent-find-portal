<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\AgentController;
use App\Http\Controllers\Frontend\User\DealController;
use App\Http\Controllers\Frontend\User\RequestAgentController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');


//Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('agent-login', [AgentController::class, 'agentLogin'])->name('agentLogin');
Route::get('agent-logout', [AgentController::class, 'agentLogOut'])->name('agentLogOut');


Route::get('login', [AgentController::class, 'showLoginForm'])->name('showLoginForm');
Route::group(['middleware' => ['chklogin']], function () {
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('user-profile/{profile_id}', [AgentController::class, 'userProfile'])->name('userProfile');
    Route::get('deal-list', [DealController::class, 'dealList'])->name('dealList');
    Route::get('deal-detail/{dealId}', [DealController::class, 'dealDetail'])->name('dealDetail');

	Route::post('update-deal-status', [DealController::class, 'updateDealStatus'])->name('updateDealStatus');
    Route::get('request-agent', [RequestAgentController::class, 'requestAgent'])->name('requestAgent');

});
/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        //Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});


