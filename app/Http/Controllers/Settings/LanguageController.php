<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\LanguageRequest;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $languages = Language::all();
        return view('settings.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('settings.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LanguageRequest $request
     * @return RedirectResponse
     */
    public function store(LanguageRequest $request): RedirectResponse
    {
        Language::create($request->validated());
        return redirect()->route('languages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Language $language
     * @return View
     */
    public function edit(Language $language): View
    {
        return view('settings.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LanguageRequest $request
     * @param Language $language
     * @return RedirectResponse
     */
    public function update(LanguageRequest $request, Language $language): RedirectResponse
    {
        $language->update($request->validated());
        return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Language $language
     * @return RedirectResponse
     */
    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();
        return redirect()->route('languages.index');
    }
}
