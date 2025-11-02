<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat!');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // regenerate session untuk keamanan
            $request->session()->regenerate();
            return redirect('/todos');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // memastikan session & token baru dibuat ulang
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
