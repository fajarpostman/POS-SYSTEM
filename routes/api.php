<?php

use App\Http\Controllers\api\v1\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/roles', [RolesController::class, 'index']);
Route::get('/roles/{id}', [RolesController::class, 'show']);
Route::post('/roles', [RolesController::class, 'store']);
Route::put('/roles/{id}', [RolesController::class, 'update']);
Route::delete('/roles/{id}', [RolesController::class, 'delete']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
