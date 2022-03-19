<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\ExerciseFile;
use App\Models\Language;
use App\Models\User;
use Illuminate\Contracts\View\View;

class SettingsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $total_users = User::count();
        $total_languages = Language::count();
        $total_courses = Course::count();
        $total_exercises = Exercise::count();
        $total_exercise_files = ExerciseFile::count();
        return view('settings.index', compact('total_users', 'total_languages', 'total_courses', 'total_exercises', 'total_exercise_files'));
    }
}
