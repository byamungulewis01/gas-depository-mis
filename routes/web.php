<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\BottleRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return to_route('login');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/requests', [DashboardController::class, 'requests'])->name('admin.requests');

    Route::resource('users', UserController::class);
    Route::resource('agents', AgentController::class);
    Route::resource('bottles', BottleController::class);
});

Route::prefix('agent')->middleware('auth')->name('agent.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'agent'])->name('dashboard');
    Route::controller(BottleRequestController::class)->group(function () {
        Route::get('/new-requests', 'new_requests')->name('requests');
        Route::post('/new-requests', 'store_requests')->name('store_requests');
        Route::get('/my-requests', 'my_requests')->name('my_requets');
        Route::get('/lookup', 'lookup')->name('requests.lookup');
        Route::put('/request-approve/{id}', 'request_approve')->name('requests.approve');
    });
    Route::get('/profile', function () {
        return view('agent.profile');
    })->name('profile');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
