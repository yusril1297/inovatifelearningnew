<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function editInformation(Request $request): View
    {
        return view('profile.edit_information', [
            'user' => $request->user(),
        ]);
    }

    public function editAvatar(Request $request): View
    {
        return view('profile.edit_avatar', [
            'user' => $request->user(),
        ]);
    }

    public function editCv(Request $request): View
    {
        return view('profile.edit_cv', [
            'user' => $request->user(),
        ]);
    }

    public function editPassword(Request $request): View
    {
        return view('profile.edit_password', [
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

        return Redirect::route('profile.edit.information')->with('status', 'profile-updated');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,pngr',
        ]);
    
        $user = $request->user();
    
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }
    
            // Simpan avatar baru
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }
    
        $user->save();
    
        return redirect()->back()->with('status', 'avatar-updated');
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

    public function updateCv(Request $request)
    {
        $request->validate([
            'cv' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
    
        $user = $request->user();
    
        if ($request->hasFile('cv')) {
            // Hapus avatar lama jika ada
            if ($user->cv) {
                Storage::delete('public/' . $user->cv);
            }
    
            // Simpan avatar baru
            $path = $request->file('cv')->store('cv', 'public');
            $user->cv = $path;
        }
    
        $user->save();
    
        return redirect()->back()->with('status', 'cv-updated');
    }
    

    
}
