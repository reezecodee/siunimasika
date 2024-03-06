<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdiRequest extends FormRequest
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
            'kode_prodi' => 'required|min:5|max:20|unique:prodis',
            'nama_prodi' => 'required|max:255|unique:prodis',
            'jenjang' => 'required|min:2|max:2',
            'status' => 'required',
            'id_fk' => 'required',
            'id_kampus' => 'required',
            'id_kaprodi' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_prodi.required' => 'Kode prodi wajib di isi',
            'kode_prodi.min' => 'Kode prodi minimal berisi 5 digit',
            'kode_prodi.max' => 'Kode prodi maximal berisi 20 digit',
            'kode_prodi.unique' => 'Kode prodi sudah pernah digunakan',
            'nama_prodi.required' => 'Nama prodi wajib di isi',
            'nama_prodi.max' => 'Nama prodi terlalu panjang',
            'nama_prodi.unique' => 'Nama prodi sudah pernah digunakan',
            'jenjang.min' => 'Jenjang harus berisi 2 digit',
            'jenjang.max' => 'Jenjang terlalu panjang, harus berisi 2 digit',
            'status.required' => 'Status fakultas wajib di isi',
            'id_fk.required' => 'Tidak ada fakultas yang di pilih, permintaan ditolak',
            'id_kaprodi.required' => 'Tidak ada kaprodi yang di pilih, permintaan ditolak',
            'id_kampus.required' => 'Tidak ada kampus yang di pilih, permintaan ditolak',
            'picture.image' => 'File harus berupa gambar',
            'picture.mimes' => 'Format ekstensi gambar yang didukung adalah jpeg, png, dan jpg',
            'picture.max' => 'Size gambar maksimal 2MB',
        ];
    }

    protected function failedValidation($validator)
    {
        return redirect()->back()->with('failed', 'Gagal menambahkan data program studi')->withInput();
    }
}
