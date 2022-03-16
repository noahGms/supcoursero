<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExerciseFileRequest;
use App\Models\ExerciseFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExerciseFileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ExerciseFileRequest $request
     * @return RedirectResponse
     */
    public function store(ExerciseFileRequest $request): RedirectResponse
    {
        $requestValidated = $request->validated();

        $file = $request->file('file');
        $file->store('public/exercise_files');

        ExerciseFile::create([
            'exercise_id' => $requestValidated['exercise_id'],
            'name' => $file->getClientOriginalName(),
            'path' => $file->hashName(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ExerciseFile $exerciseFile
     * @return RedirectResponse
     */
    public function destroy(ExerciseFile $exerciseFile): RedirectResponse
    {
        Storage::delete('public/exercise_files/' . $exerciseFile->path);
        $exerciseFile->delete();
        return redirect()->route('home.index');
    }

    /**
     * Download file from public storage.
     *
     * @param ExerciseFile $exerciseFile
     * @return StreamedResponse
     */
    public function download(ExerciseFile $exerciseFile): StreamedResponse
    {
        return response()->streamDownload(function () use ($exerciseFile) {
            echo Storage::get('public/exercise_files/' . $exerciseFile->path);
        }, $exerciseFile->name . '.' . $exerciseFile->extension);
    }
}
