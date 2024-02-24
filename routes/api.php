<?php

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

Route::prefix('auth')->group(function () {
    Route::post('login', [App\Http\Controllers\LoginController::class, 'login'])->name('auth.login');
    Route::post('logout', [App\Http\Controllers\LoginController::class, 'logout']);
    Route::post('register', [App\Http\Controllers\RegisterController::class, 'register']);

});

Route::get('teste', fn () => response()->json(['message' => 'ok']));
