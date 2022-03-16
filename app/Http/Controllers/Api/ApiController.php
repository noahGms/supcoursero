<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exercise;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getCoursesByLanguage(Request $request): JsonResponse
    {
        $courses = Course::where('language_id', $request->get('language_id'))->get();
        return response()->json($courses);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getExercisesByCourse(Request $request): JsonResponse
    {
        $exercises = Exercise::where('course_id', $request->get('course_id'))->get();
        return response()->json($exercises);
    }
}
