<?php

use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/youtube')->middleware(['auth', 'google.token'])->group(function () {
    Route::withoutMiddleware('google.token')->group(function () {
        Route::get('/createAuthUrl', [YoutubeController::class, 'createAuthUrl']);
        Route::get('/checkKey', [YoutubeController::class, 'checkKey']);
    });
    Route::get('/', [YoutubeController::class, 'index'])->name('youtube');
    Route::get('/export-playlists', [YoutubeController::class, 'exportAllPlaylists']);
});

// TODO protecc
Route::prefix('/api')->group(function () {
    Route::prefix('/youtube')->middleware('google.token')->group(function () {
        Route::get('/playlists', [\App\Http\Controllers\Api\YoutubeController::class, 'playlists']);
        Route::post('/export-playlists', [\App\Http\Controllers\Api\YoutubeController::class, 'exportPlaylists']);
    });
});
