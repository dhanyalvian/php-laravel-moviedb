<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController,
    App\Http\Controllers\MovieController,
    App\Http\Controllers\PeopleController,
    App\Http\Controllers\CastController;

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

Route::get('/movies/now-playing', [MovieController::class, 'nowplaying']);
Route::get('/movies/popular', [MovieController::class, 'popular']);
Route::get('/movies/top-rated', [MovieController::class, 'toprated']);
Route::get('/movies/upcoming', [MovieController::class, 'upcoming']);
Route::get('/movies/{uid}', [MovieController::class, 'detail']);
Route::get('/movies/{uid}/casts', [CastController::class, 'list']);

Route::get('/peoples/popular', [PeopleController::class, 'popular']);