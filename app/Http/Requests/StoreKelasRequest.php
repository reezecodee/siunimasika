<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKelasRequest extends FormRequest
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
            'kode_kelas' => 'required|min:5|max:20|unique:kelas',
            'nama_kelas' => 'required|max:255|unique:kelas',
            'status' => 'required',
            'id_prodi' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_kelas.required' => 'Kode kelas wajib di isi',
            'kode_kelas.min' => 'Kode kelas minimal berisi 5 digit',
            'kode_kelas.max' => 'Kode kelas maximal berisi 20 digit',
            'kode_kelas.unique' => 'Kode kelas sudah pernah digunakan',
            'nama_kelas.required' => 'Nama kelas wajib di isi',
            'nama_kelas.max' => 'Nama kelas terlalu panjang',
            'nama_kelas.unique' => 'Nama kelas sudah pernah digunakan',
            'status.required' => 'Status wajib di isi',
            'id_prodi.required' =>  'Program studi wajib di pilih',
        ];
    }

    protected function failedValidation($validator)
    {
        return redirect()->back()->withError('Gagal menambahkan data kelas')->withInput();
    }
}
