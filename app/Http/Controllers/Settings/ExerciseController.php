<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ExerciseRequest;
use App\Models\Course;
use App\Models\Exercise;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $exercises = Exercise::all();
        return view('settings.exercises.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $courses = Course::all();
        return view('settings.exercises.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExerciseRequest $request
     * @return RedirectResponse
     */
    public function store(ExerciseRequest $request): RedirectResponse
    {
        $requestValidated = $request->validated();

        $file = $request->file('model');
        $file->store('public/exercises_models');

        Exercise::create([
            'name' => $requestValidated['name'],
            'course_id' => $requestValidated['course_id'],
            'model_name' => $file->getClientOriginalName(),
            'model_path' => $file->hashName(),
        ]);

        return redirect()->route('exercises.index')->with('success', 'Exercise created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Exercise $exercise
     * @return View
     */
    public function edit(Exercise $exercise): View
    {
        $courses = Course::all();
        return view('settings.exercises.edit', compact('exercise', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ExerciseRequest $request
     * @param Exercise $exercise
     * @return RedirectResponse
     */
    public function update(ExerciseRequest $request, Exercise $exercise): RedirectResponse
    {
        $exercise->update($request->validated());
        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exercise $exercise
     * @return RedirectResponse
     */
    public function destroy(Exercise $exercise): RedirectResponse
    {
        Storage::delete('public/exercises_models/' . $exercise->model_path);
        $exercise->delete();
        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully');
    }

    /**
     * Download file from public storage.
     *
     * @param Exercise $exercise
     * @return StreamedResponse
     */
    public function download(Exercise $exercise): StreamedResponse
    {
        return response()->streamDownload(function () use ($exercise) {
            echo Storage::get('public/exercises_models/' . $exercise->model_path);
        }, $exercise->model_name . '.' . $exercise->model_extension);
    }
}
