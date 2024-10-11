<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware'=>'guest'],function () {
    Route::get('/', [AuthController::class, 'loginForm'])->name('login');
    Route::get('/register-form', [AuthController::class, 'registerForm']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['middleware'=>'auth'],function () {
    Route::get('/film', [FilmController::class, 'index']);
    Route::post('/film/add', [FilmController::class, 'store']);
    Route::post('/film/update/{id}', [FilmController::class, 'update']);
    Route::post('/film/delete/{id}', [FilmController::class, 'destroy']);

    Route::get('/genre', [GenreController::class, 'index']);
    Route::post('/genre/add', [GenreController::class, 'store']);
    Route::post('/genre/update/{id}', [GenreController::class, 'update']);
    Route::post('/genre/delete/{id}', [GenreController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
