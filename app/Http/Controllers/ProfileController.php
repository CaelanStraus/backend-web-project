<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function destroyUser(Request $request, $id): RedirectResponse
    {
        $userToDelete = DB::table('users')->where('id', $id)->first();

        if ($userToDelete) {
            DB::table('users')->where('id', $id)->delete();
            return Redirect::back()->with('success', 'User deleted successfully.');
        }

        return Redirect::back()->with('error', 'You do not have the privilege to delete this user.');
    }

    public function updateDOB(Request $request): RedirectResponse
    {
        $request->validate([
            'dob' => ['required', 'date'],
        ]);

        $request->user()->update([
            'dob' => $request->input('dob'),
        ]);

        return Redirect::route('profile.edit')->with('status', 'dob-updated');
    }

    public function updateBio(Request $request): RedirectResponse
    {
        $request->validate([
            'bio' => ['nullable', 'string', 'max:255'],
        ]);

        $request->user()->update([
            'bio' => $request->input('bio'),
        ]);

        return Redirect::route('profile.edit')->with('status', 'bio-updated');
    }

    public function promoteUser($id)
    {
        $user = (array) DB::table('users')->where('id', $id)->first();
        User::where('id', $id)->update(['role' => 'admin']);

        return redirect()->back()->with('success', 'User promoted successfully.');
    }

    public function demoteUser($id)
    {
        $user = (array) DB::table('users')->where('id', $id)->first();
        User::where('id', $id)->update(['role' => 'user']);

        return redirect()->back()->with('success', 'User demoted successfully.');
    }

    public function showUserProfile($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('profilePage', compact('user'));
        }

        return redirect()->route('home')->with('error', 'User not found.');
    }
}
