<?php

use Illuminate\Http\Request;
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

Route::group([], function () {
    Route::post('courses-by-language', [\App\Http\Controllers\Api\ApiController::class, 'getCoursesByLanguage'])->name('api.courses-by-language');
    Route::post('exercises-by-course', [\App\Http\Controllers\Api\ApiController::class, 'getExercisesByCourse'])->name('api.exercises-by-course');
    Route::post('exercise-files/{exerciseFile}/set-rating', [\App\Http\Controllers\Api\ApiController::class, 'setRatingToExerciseFile'])->name('api.exercise-files.set-rating');
});
