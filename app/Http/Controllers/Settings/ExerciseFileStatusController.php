<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ExerciseFileStatusRequest;
use App\Models\ExerciseFileStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ExerciseFileStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $statuses = ExerciseFileStatus::all();
        return view('settings.exercise_file_statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('settings.exercise_file_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExerciseFileStatusRequest $request
     * @return RedirectResponse
     */
    public function store(ExerciseFileStatusRequest $request): RedirectResponse
    {
        ExerciseFileStatus::create($request->validated());
        return redirect()->route('exercise-file-statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ExerciseFileStatus $exerciseFileStatus
     * @return View
     */
    public function edit(ExerciseFileStatus $exerciseFileStatus): View
    {
        return view('settings.exercise_file_statuses.edit', compact('exerciseFileStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ExerciseFileStatusRequest $request
     * @param ExerciseFileStatus $exerciseFileStatus
     * @return RedirectResponse
     */
    public function update(ExerciseFileStatusRequest $request, ExerciseFileStatus $exerciseFileStatus): RedirectResponse
    {
        $exerciseFileStatus->update($request->validated());
        return redirect()->route('exercise-file-statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ExerciseFileStatus $exerciseFileStatus
     * @return RedirectResponse
     */
    public function destroy(ExerciseFileStatus $exerciseFileStatus): RedirectResponse
    {
        $exerciseFileStatus->delete();
        return redirect()->route('exercise-file-statuses.index');
    }
}
