<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.profile', compact('user'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = User::where('id', $user->id)->first();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $userId = auth()->user()->id;
         
        $validate = $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|string|email|unique:users,email,". $userId,
            'phone' => "required|numeric|unique:users,phone," . $userId,
            'alamat' => "required|string",
        ]);


        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
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
}
