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
            'daya_tampung' => 'required|min:2|max:3',
            'status' => 'required',
            'id_fk' => 'required',
            'id_prodi' => 'required',
            'id_kampus' => 'required',
            'id_dosen_pa' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'kode_kelas.required' => 'Kode kelas wajib di isi',
            'kode_kelas.min' => 'Kode kelas minimal berisi 5 digit',
            'kode_kelas.max' => 'Kode kelas maximal berisi 20 digit',
            'kode_kelas.unique' => 'Kode kelas sudah pernah digunakan',
            'daya_tampung.required' => 'Daya tampung kelas wajib di isi',
            'daya_tampung.min' => 'Daya tampung minimal berisi 2 digit angka',
            'daya_tampung.max' => 'Daya tampung maximal berisi 3 digit angka',
            'status.required' => 'Status wajib di isi',
            'id_fk.required' =>  'Fakultas wajib di pilih',
            'id_prodi.required' =>  'Program studi wajib di pilih',
            'id_kampus.required' => 'Kampus wajib di pilih',
            'id_dosen_pa.required' => 'Dosen pembimbing akademik wajib di pilih'
        ];
    }

    protected function failedValidation($validator)
    {
        return redirect()->back()->with('failed', 'Gagal menambahkan data kelas')->withInput();
    }
}
