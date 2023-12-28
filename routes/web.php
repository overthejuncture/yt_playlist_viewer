<?php

use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::prefix('ext')->group(base_path('routes/ext.php'));

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('/createAuthUrl', [YoutubeController::class, 'createAuthUrl']);
//Route::get('/checkKey', [YoutubeController::class, 'checkKey']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken('extension');

        return ['token' => $token->plainTextToken];
    });

    Route::view('{slug?}', 'vue')->name('youtube')->where('slug', '.*');
});


