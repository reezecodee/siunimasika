<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // login view
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login - Universitas Transformasi Informatika'
        ]);
    }

    // login handler
    public function loginHandler(Request $request)
    {
        $credentials = $request->validate([
            'nip_nim' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/e-learning/dashboard');
        }

        return back()->with('failed', 'NIP/NIM atau password yang anda masukkan salah')->withInput();
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
