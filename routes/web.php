<?php

use App\Http\Controllers\YoutubeController;
use Illuminate\Http\Request;
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

Route::middleware(['auth', 'google.token'])->group(function () {
    Route::withoutMiddleware('google.token')->group(function () {
        Route::get('/createAuthUrl', [YoutubeController::class, 'createAuthUrl']);
        Route::get('/checkKey', [YoutubeController::class, 'checkKey']);
    });
    Route::view('{slug?}', 'vue')->name('youtube')->where('slug', '.*');
});
