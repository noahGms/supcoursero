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
    Route::get('/exercise-files/{exerciseFile}/download', [App\Http\Controllers\ExerciseFileController::class, 'download'])->name('exercise-files.download');
    Route::resource('/exercise-files', App\Http\Controllers\ExerciseFileController::class)->only(['store', 'destroy']);

    Route::group(['prefix' => 'settings', 'middleware' => 'isAdmin'], function () {
        Route::get('/', [App\Http\Controllers\Settings\SettingsController::class, 'index'])->name('settings.index');
        Route::resource('languages', App\Http\Controllers\Settings\LanguageController::class)->except(['show']);
        Route::resource('courses', App\Http\Controllers\Settings\CourseController::class)->except(['show']);

        Route::get('/exercises/{exercise}/download', [App\Http\Controllers\Settings\ExerciseController::class, 'download'])->name('exercises.download');
        Route::resource('exercises', App\Http\Controllers\Settings\ExerciseController::class)->except(['show']);

        Route::resource('exercise-file-statuses', App\Http\Controllers\Settings\ExerciseFileStatusController::class)->except(['show']);

        Route::post('/users/{user}/toggle-admin', [App\Http\Controllers\Settings\UserController::class, 'toggleAdmin'])->name('users.toggle-admin');
        Route::resource('users', App\Http\Controllers\Settings\UserController::class)->only(['index', 'destroy']);
    });


    Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});
