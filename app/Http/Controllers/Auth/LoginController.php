<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminPusat;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login - Universitas Transformasi Informatika',
            'check_admin_pusat' => AdminPusat::count()
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
            } else if ($role == 'Dosen') {
                $namaUser = Dosen::where('id_user', auth()->user()->id)->first();
            } else {
                $namaUser = Mahasiswa::where('id_user', auth()->user()->id)->first();
            }

            return redirect()->intended('/e-learning/dashboard')->withSuccess('Selamat datang <strong>' . $namaUser->nama . ', </strong> Senang bisa melihat Anda kembali!');
        }

        return back()->withError('NIP/NIM atau password Anda salah')->withInput();
    }
}
