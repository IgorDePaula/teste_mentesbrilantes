<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{StateController, CityController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/state', [StateController::class, 'index']);
Route::get('/state/{state}', [StateController::class, 'show']);

Route::get('/city', [CityController::class, 'index']);
Route::get('/city/{city}', [CityController::class, 'show']);
