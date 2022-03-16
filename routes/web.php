<?php

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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.index');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.login');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [App\Http\Controllers\Settings\SettingsController::class, 'index'])->name('settings.index');
        Route::resource('languages', App\Http\Controllers\Settings\LanguageController::class);
    });


    Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});
