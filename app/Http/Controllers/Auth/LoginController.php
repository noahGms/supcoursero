<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        unset($credentials['remember_me']);

        if (Auth::attempt($credentials, $request->filled('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->route('home.index')->with('success', 'Welcome back ' . Auth::user()->name . ' !');
        }

        return back()->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
