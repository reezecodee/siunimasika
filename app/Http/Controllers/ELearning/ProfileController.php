<?php

namespace App\Http\Controllers\ELearning;

use App\Http\Controllers\Controller;
use App\Models\AdminPusat;
use App\Models\User;
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

    public function updateProfilePicture(Request $request)
    {
        $folderPath = public_path('img/profile/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = time() . uniqid() . '.png';

        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);

        // baru admin pusat
        $adminPusat = AdminPusat::where('id_user', auth()->user()->id)->first();
        $previousProfilePath = public_path('img/profile/' . $adminPusat->photo_profile);
        $adminPusat->photo_profile = $imageName;
        $adminPusat->save();

        if (file_exists($previousProfilePath)) {
            unlink($previousProfilePath);
        }

        return response()->json(['success' => 'Photo profile sukses disimpan']);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'       => 'required',
            'new_password'       => 'required',
            'confirm_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Password saat ini wajib di isi',
            'new_password.required' => 'Password baru wajib di isi',
            'confirm_password.required' => 'Konfirmasi password wajib di isi',
            'confirm_password.same' => 'Konfirmasi password harus sama dengan password baru'
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withError('Password tidak cocok');
        }

        $user = User::where('id', auth()->user()->id)->first();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('e-learn.profile')->withSuccess('Password telah berhasi diperbarui');
    }
}
