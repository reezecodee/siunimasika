<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminKampus;
use App\Models\AdminPusat;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login - Universitas Transformasi Informatika'
        ]);
    }

    public function loginHandler(Request $request)
    {
        $credentials = $request->validate([
            'nip_nim' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = auth()->user()->role;
            if ($role == 'Admin Pusat') {
                $namaUser = AdminPusat::where('id_user', auth()->user()->id)->first();
            } else if ($role == 'Admin Kampus') {
                $namaUser = AdminKampus::where('id_user', auth()->user()->id)->first();
            } else if ($role == 'Dosen') {
                $namaUser = Dosen::where('id_user', auth()->user()->id)->first();
            } else {
                $namaUser = Mahasiswa::where('id_user', auth()->user()->id)->first();
            }

            return redirect()->intended('/e-learning/dashboard')->withSuccess('Selamat datang <strong>' . $namaUser->nama . ', </strong> Senang bisa melihat Anda kembali!');
        }

        return back()->withError('NIP/NIM atau password Anda salah')->withInput();
    }

    public function forgetPassword()
    {
        return view('auth.forget-password', [
            'title' => 'Lupa password - Universitas Transformasi Informatika'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
