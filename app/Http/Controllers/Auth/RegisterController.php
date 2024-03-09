<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\AdminPusat;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register Admin Pusat',
        ]);
    }

    public function registerHandler(StoreRegisterRequest $request){
        $validated = $request->validated();

        $primaryTable = [
            'nip_nim' => $validated['nip_nim'],
            'email' => $validated['email'],
            'telp' => $validated['telp'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ];

        $newUser = User::create($primaryTable);

        $foreignTable = [
            'id_user' => $newUser->id,
            'nama' => $validated['nama'],
            'jk' => $validated['jk'],
            'alamat' => null,
            'photo_profile' => null,
            'status' => $validated['status']
        ];

        AdminPusat::create($foreignTable);
        return redirect()->route('auth.login')->withSuccess('Akun admin pusat sukses dibuat, silahkan login');
    }
}
