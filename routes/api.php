<?php

use App\Http\Controllers\Api\Youtube\WatchLaterController;
use App\Http\Controllers\Api\YoutubeController;
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

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('/youtube')->group(function () {
        Route::get('/categories', [YoutubeController::class, 'categories']);
        Route::post('/categories/create', [YoutubeController::class, 'createCategory']);
        Route::post('/categories/set', [WatchLaterController::class, 'setCategory']);
        Route::post('/export-playlists', [YoutubeController::class, 'exportPlaylists']);
        Route::get('/playlists', [YoutubeController::class, 'playlists']);
        Route::get('/watch-later/get', [WatchLaterController::class, 'get']);
        Route::post('/watch-later/parse-html', [WatchLaterController::class, 'parseFromHtml']);
    });
});

