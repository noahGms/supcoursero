<?php

namespace App\Http\Controllers;

use App\Models\ExerciseFile;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Index page
     *
     * @return View
     */
    public function index(): View
    {
        $languages = Language::all();
        $exerciseFiles = ExerciseFile::where('user_id', Auth::id())->get();

        return view('home', compact('languages', 'exerciseFiles'));
    }
}
