<?php

use App\Http\Controllers\api\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');


Route::post('/auth/reset', [AuthController::class, 'update'])->name('password.update');