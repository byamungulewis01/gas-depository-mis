<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\TailorAuthController;
use App\Http\Controllers\SubscriptionPlanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('tailor')->group(function () {
    Route::post('register', [TailorAuthController::class, 'register']);
    Route::post('login', [TailorAuthController::class, 'login']);
    Route::post('forgot-password', [TailorAuthController::class, 'forgotPassword']);
    Route::post('reset-password', [TailorAuthController::class, 'resetPassword']);
    Route::get('subscriptions-plan', [SubscriptionPlanController::class, 'plan_list']);

    // Protected tailor routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [TailorAuthController::class, 'logout']);
        Route::get('me', [TailorAuthController::class, 'me']);

        // New routes for account management
        Route::put('profile', [TailorAuthController::class, 'updateProfile']);
        Route::put('change-password', [TailorAuthController::class, 'changePassword']);

        // Add client management routes here
        Route::apiResource('clients', ClientController::class);
        Route::post('renew-subscription', [ClientController::class, 'renew_subscription']);
    });
});
