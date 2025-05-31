<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\activationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|string|email|unique:users",
            'password' => "required|string|min:8|confirmed",
            'phone' => "required|numeric|unique:users",
            'alamat' => "required|string",
        ]);

        $activationToken = Str::random(64);

        try {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'phone' => $request['phone'],
                'alamat' => $request['alamat'],
                'activation_token' => $activationToken
            ]);
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Registration failed!' . $e->getMessage());
        }
        Mail::to($user->email)->send(new activationEmail($user, $activationToken));

        return redirect()->route('auth.login')->with('success', 'Cek email untuk aktivasi akun!');
    }

    public function activate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if(!$user){
            return redirect()->back()->with(['error' => 'Token tidak valid']);
        }
        $user->update([
            'is_active' => 1,
            'activation_token' => null,
            'email_verified_at' => now()
        ]);
        return redirect()->route('auth.login')->with('success', 'Email telah diaktivasi!');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => "required|email",
            'password' => "required|string"
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password salah!');
        }

        if (!$user->is_active) {
            return back()->with('error', 'Email belum diaktivasi!');
        }

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->back()->with('error', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
