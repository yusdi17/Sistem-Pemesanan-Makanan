<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Auth.register');
    }
    
    public function register(Request $request){
        $validate = $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|string|email|unique:users",
            'password' => "required|string|min:8"
        ]);
    }
}
