<?php

namespace App\Http\Controllers\ELearning;

use App\Http\Controllers\Controller;
use App\Models\AdminKampus;
use App\Models\AdminPusat;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('e-learning.profile', [
            'title' => 'Profile Saya'
        ]);
    }

    public function store(Request $request, string $id)
    {
        $validate = $request->validate([
            'photo_profile' => 'image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required'
        ], [
            'alamat.required' => 'Alamat wajib di isi',
            'picture.image' => 'File harus berupa gambar',
            'picture.mimes' => 'Format ekstensi gambar yang didukung adalah jpeg, png, dan jpg',
            'picture.max' => 'Size gambar maksimal 2MB',
        ]);

        if ($request->file('photo_profile')) {
            $file = $request->file('photo_profile');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img/profile_users', $fileName);
            $validate['photo_profile'] = $fileName;
        }

        if (auth()->user()->role == "Admin Pusat") {
            AdminPusat::find($id)->update($validate);
        } else if (auth()->user()->role == "Admin Kampus") {
            AdminKampus::find($id)->update($validate);
        } else if (auth()->user()->role == "Dosen") {
            Dosen::find($id)->update($validate);
        } else {
            Mahasiswa::find($id)->update($validate);
        }
        return redirect('/e-learning/profile')->withSuccess('Berhasil memperbarui data profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'       => 'required',
            'new_password'       => 'required',
            'confirm_password' => 'required|same:new_password',
        ],[
            'current_password.required' => 'Password saat ini wajib di isi',
            'new_password.required' => 'Password baru wajib di isi',
            'confirm_password.required' => 'Konfirmasi password wajib di isi',
            'confirm_password.same' => 'Konfirmasi password harus sama dengan password baru'
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withError('Password tidak cocok');
        }
    
        Auth::user()->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect()->route('e-learn.profile')->withSuccess('Password telah berhasi diperbarui');
    }
}
