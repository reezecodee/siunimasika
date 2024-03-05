<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnivRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $univ = route('data-kampus.update');
        return [
            'kode_pt' => 'required|min:5|max:20|unique:universitas,kode_pt,' . $univ,
            'nama_pt' => 'required|max:255|unique:universitas,nama_pt,' . $univ,
            'kategori' => 'required',
            'status' => 'required',
            'tanggal_berdiri' => 'required',
            'telepon' => 'required|unique:universitas,telepon,' . $univ,
            'email' => 'required|email|unique:universitas,email,' . $univ,
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'kode_pt.required' => 'Kode perguruan tinggi wajib di isi',
            'kode_pt.min' => 'Kode perguruan tinggi minimal berisi 5 digit',
            'kode_pt.max' => 'Kode perguruan tinggi maximal berisi 20 digit',
            'kode_pt.unique' => 'Kode sudah pernah digunakan',
            'nama_pt.required' => 'Nama perguruan tinggi wajib di isi',
            'nama_pt.max' => 'Nama perguruan tinggi terlalu panjang',
            'nama_pt.unique' => 'Nama perguruan tinggi sudah pernah digunakan',
            'kategori.required' => 'Kategori wajib di isi',
            'status.required' => 'Status wajib di isi',
            'tanggal_berdiri.required' => 'Tanggal berdiri kampus wajib di isi',
            'telepon.required' => 'No telepon wajib di isi',
            'telepon.unique' => 'No telepon sudah pernah digunakan',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Data bukan email',
            'email.unique' => 'Email sudah pernah digunakan',
            'picture.image' => 'File harus berupa gambar.',
            'picture.mimes' => 'Format ekstensi gambar yang didukung adalah jpeg, png, dan jpg',
            'picture.max' => 'Size gambar maksimal 2MB',
            'alamat.required' => 'Alamat wajib di isi',
        ];
    }

    protected function failedValidation($validator)
    {
        return redirect()->back()->with('failed', 'Gagal memperbarui data kampus')->withInput();
    }
}
