<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnivRequest extends FormRequest
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
        return [
            'kode_kampus' => 'required|min:5|max:20|unique:kampuses',
            'nama_kampus' => 'required|max:255|unique:kampuses',
            'kategori' => 'required',
            'status' => 'required',
            'telepon' => 'required|unique:kampuses',
            'email' => 'required|unique:kampuses',
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_kampus.required' => 'Kode kampus wajib di isi',
            'kode_kampus.min' => 'Kode kampus minimal berisi 5 digit',
            'kode_kampus.max' => 'Kode kampus maximal berisi 20 digit',
            'kode_kampus.unique' => 'Kode sudah pernah digunakan',
            'nama_kampus.required' => 'Nama kampus wajib di isi',
            'nama_kampus.max' => 'Nama kampus terlalu panjang',
            'nama_kampus.unique' => 'Nama kampus sudah pernah digunakan',
            'kategori.required' => 'Kategori kampus wajib di isi',
            'status.required' => 'Status kampus wajib di isi',
            'telepon.required' => 'No telepon wajib di isi',
            'telepon.unique' => 'No telepon sudah pernah digunakan',
            'email.required' => 'Email wajib di isi',
            'email.unique' => 'Email sudah pernah digunakan',
            'picture.image' => 'File harus berupa gambar',
            'picture.mimes' => 'Format ekstensi gambar yang didukung adalah jpeg, png, dan jpg',
            'picture.max' => 'Size gambar maksimal 2MB',
            'alamat.required' => 'Alamat wajib di isi',
        ];
    }

    protected function failedValidation($validator)
    {
        return redirect()->back()->with('failed', 'Gagal menambahkan data kampus')->withInput();
    }
}
