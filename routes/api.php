<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\VideosController;
use App\Http\Controllers\Api\WatchLaterController;
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
    Route::prefix('/videos')->group(function () {
        Route::get('/get', [VideosController::class, 'get']);
        Route::get('/{video}', [VideosController::class, 'getById']);
        Route::post('/{video}/categories', [VideosController::class, 'setCategory']);
    });
    Route::prefix('/watch-later')->group(function () {
        Route::post('/parse-html', [WatchLaterController::class, 'parseFromHtml']);
    });
    Route::prefix('/categories')->group(function () {
        Route::get('', [CategoriesController::class, 'index']);
        Route::post('', [CategoriesController::class, 'store']);
        Route::delete('{category}', [CategoriesController::class, 'delete']);
        Route::post('/{category}/addSubcategory', [CategoriesController::class, 'addSubcategory']);
        Route::get('/{id}', [CategoriesController::class, 'show']);
        Route::post('/search', [CategoriesController::class, 'search']);
    });
    Route::post('/export-playlists', [YoutubeController::class, 'exportPlaylists']);
    Route::get('/playlists', [YoutubeController::class, 'playlists']);
});

