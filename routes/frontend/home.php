<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\AgentController;


/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');


//Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('agent-list', [AgentController::class, 'agentList'])->name('agentList');
Route::post('agent-login', [AgentController::class, 'agentLogin'])->name('agentLogin');
Route::get('agent-logout', [AgentController::class, 'agentLogOut'])->name('agentLogOut');
Route::get('user-profile', [AgentController::class, 'userProfile'])->name('userProfile');

Route::get('login', [AgentController::class, 'showLoginForm'])->name('showLoginForm');
Route::group(['middleware' => ['chklogin']], function () {
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

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


