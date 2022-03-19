<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::all();
        return view('settings.users.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /*
    * Update the specified resource in storage.
    *
    * @param User $user
    * @return RedirectResponse
    */
    public function toggleAdmin(User $user): RedirectResponse
    {
        $user->is_admin = !$user->is_admin;
        $user->save();
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
