<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function() {
    Route::post('/user/login', [AuthController::class, 'login']);
});

Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::post('/user/profile', [ProfileController::class, 'read']);

    Route::put('/user/profile', [ProfileController::class, 'update']);
});