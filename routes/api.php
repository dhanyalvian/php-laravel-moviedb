<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/movies/popular', App\Http\Controllers\Api\Movies\PopularController::class);
Route::apiResource('/movies/now-playing', App\Http\Controllers\Api\Movies\NowplayingController::class);
Route::apiResource('/movies/top-rated', App\Http\Controllers\Api\Movies\TopratedController::class);
Route::apiResource('/movies/upcoming', App\Http\Controllers\Api\Movies\UpcomingController::class);
Route::apiResource('/movies/{uid}/casts', App\Http\Controllers\Api\Movies\CastController::class);
Route::apiResource('/movies/{uid}/recommendations', App\Http\Controllers\Api\Movies\RecommendationsController::class);

Route::apiResource('/peoples/popular', App\Http\Controllers\Api\Peoples\PopularController::class);
