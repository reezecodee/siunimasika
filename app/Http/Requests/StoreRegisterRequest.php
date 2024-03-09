<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'nama' => 'required|min:5|max:255',
            'nip_nim' => 'required|unique:users,nip_nim',
            'jk' => 'required',
            'email' => 'required|email|unique:users,email',
            'telp' => 'required|unique:users,telp',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'role' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(): array{
        return [
            'nama.required' => 'Nama wajib di isi',
            'nama.min' => 'Nama terlalu pendek minimal 5 digit',
            'nama.max' => 'Nama terlalu panjang',
            'nip_nim.required' => 'NIP wajib di isi',
            'nip_nim.unique' => 'NIP sudah pernah digunakan',
            'jk.required' => 'Jenis kelamin wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Data harus berupa email',
            'email.unique' => 'Email sudah pernah digunakan',
            'telp.required' => 'No telepon wajib di isi',
            'telp.unique' => 'No telepon sudah pernah digunakan',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 8 digit',
            'confirm_password.required' => 'Konfirmasi password wajib di isi',
            'confirm_password.same' => 'Konfirmasi password tidak valid dengan password',
            'role.required' => 'Role wajib di isi',
            'status.required' => 'Status wajib di isi'
        ];
    }
}
