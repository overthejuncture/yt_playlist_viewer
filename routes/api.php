<?php

use App\Http\Controllers\Api\Youtube\CategoriesController;
use App\Http\Controllers\Api\Youtube\VideosController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/youtube')->group(function () {
        Route::prefix('/videos')->group(function () {
            Route::get('/get', [VideosController::class, 'get']);
            Route::post('/set-category', [VideosController::class, 'setCategory']);
        });
        Route::prefix('/watch-later')->group(function () {
            Route::get('/get', [WatchLaterController::class, 'get']);
            Route::post('/parse-html', [WatchLaterController::class, 'parseFromHtml']);
        });
        Route::prefix('/categories')->group(function () {
            Route::get('', [CategoriesController::class, 'get']);
            Route::post('', [CategoriesController::class, 'store']);
            Route::delete('{category}',[CategoriesController::class, 'delete']);
        });
        Route::post('/export-playlists', [YoutubeController::class, 'exportPlaylists']);
        Route::get('/playlists', [YoutubeController::class, 'playlists']);
    });
});

