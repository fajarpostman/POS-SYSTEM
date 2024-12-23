<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\RolesController;
use App\Http\Controllers\api\v1\PasswordResetController;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('roles')->group(function () {
    Route::apiResource('/', RolesController::class);
});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/signin', [AuthController::class, 'signin']);
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/signout', [AuthController::class, 'signout']);
});
Route::post('/forgot-password', [AuthController::class, 'forget']);
Route::post('/reset-password', [AuthController::class, 'reset']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('user', UserController::class);
});