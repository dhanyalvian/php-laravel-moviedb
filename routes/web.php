<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController,
    App\Http\Controllers\MoviesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index']);

Route::get('/movies/now-playing', [MoviesController::class, 'nowplaying']);
Route::get('/movies/popular', [MoviesController::class, 'popular']);
Route::get('/movies/top-rated', [MoviesController::class, 'toprated']);
Route::get('/movies/upcoming', [MoviesController::class, 'upcoming']);
Route::get('/movies/{uid}', [MoviesController::class, 'detail']);
