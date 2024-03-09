<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFkRequest extends FormRequest
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
            'id_dekan' => 'required',
            'kode_fk' => 'required|min:5|max:20|unique:fakultas',
            'nama_fk' => 'required|max:255|unique:fakultas',
            'status' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'id_dekan.required' => 'Dekan fakultas wajib di pilih',
            'kode_fk.required' => 'Kode fakultas wajib di isi',
            'kode_fk.min' => 'Kode fakultas minimal berisi 5 digit',
            'kode_fk.max' => 'Kode fakultas maximal berisi 20 digit',
            'kode_fk.unique' => 'Kode fakultas sudah pernah digunakan',
            'nama_fk.required' => 'Nama fakultas wajib di isi',
            'nama_fk.max' => 'Nama fakultas terlalu panjang',
            'nama_fk.unique' => 'Nama fakultas sudah pernah digunakan',
            'status.required' => 'Status fakultas wajib di isi',
            'picture.image' => 'File harus berupa gambar',
            'picture.mimes' => 'Format ekstensi gambar yang didukung adalah jpeg, png, dan jpg',
            'picture.max' => 'Size gambar maksimal 2MB',
        ];
    }

    protected function failedValidation($validator)
    {
        return redirect()->back()->with('failed', 'Gagal menambahkan data fakultas')->withInput();
    }
}
