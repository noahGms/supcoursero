<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\ExerciseFile;
use App\Models\ExerciseFileStatus;
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

    /**
     * @param Request $request
     * @param ExerciseFile $exerciseFile
     * @return JsonResponse
     */
    public function setRatingToExerciseFile(Request $request, ExerciseFile $exerciseFile): JsonResponse
    {
        $exerciseFile->rating = $request->get('rating');
        $exerciseFile->exercise_file_status_id = ExerciseFileStatus::STATUS_SCORED;
        $exerciseFile->save();
        return response()->json($exerciseFile);
    }
}
