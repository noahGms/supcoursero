<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\CourseRequest;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $courses = Course::all();
        return view('settings.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $languages = Language::all();
        return view('settings.courses.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest $request
     * @return RedirectResponse
     */
    public function store(CourseRequest $request): RedirectResponse
    {
        Course::create($request->validated());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return View
     */
    public function edit(Course $course): View
    {
        $languages = Language::all();
        return view('settings.courses.edit', compact('course', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest $request
     * @param Course $course
     * @return RedirectResponse
     */
    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        $course->update($request->validated());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
