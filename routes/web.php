<?php

use App\Http\Controllers\BottleController;
use App\Http\Controllers\BottleRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\TailorsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return to_route('login');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/requests', [DashboardController::class, 'requests'])->name('admin.requests');

    Route::resource('users', UserController::class);
    Route::resource('subscription-plan', SubscriptionPlanController::class);
    Route::controller(TailorsController::class)->name('tailors.')->prefix('tailors')->group(function () {
        Route::get('/', 'index')->name('index');
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
