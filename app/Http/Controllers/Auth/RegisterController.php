<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('login.index');
    }
}
