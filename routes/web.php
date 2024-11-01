<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('team')->group(function(){
        Route::get('', [TeamMemberController::class, 'index'])->name('team');
        Route::prefix('{user}')->group(function(){
            Route::get('', [TeamMemberController::class, 'show'])->name('team.show');
        });
    });

    Route::prefix('referrals')->group(function(){
        Route::get('', [ReferralController::class, 'index'])->name('referrals');
    });

    Route::prefix('users')->group(function(){
        Route::get('', [UserController::class, 'index'])->name('users');
        Route::prefix('{user}')->group(function(){
            Route::get('delete', [UserController::class, 'destroy'])->name('users.destroy');
        });
    });

    Route::prefix('settings')->group(function(){
        Route::get('', [SettingController::class, 'index'])->name('settings');
    });
});
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');
require __DIR__.'/auth.php';
