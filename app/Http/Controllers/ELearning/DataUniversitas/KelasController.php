<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKelasRequest;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kampus;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('e-learning.data-universitas.kelas', [
            'title' => 'Daftar Data Kelas',
            'data_kelas' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('e-learning.data-universitas.create.create-kelas', [
            'title' => 'Tambah Kelas Baru',
            'dosen_pa' => Dosen::all(),
            'data_kampus' => Kampus::all(),
            'data_fakultas' => Fakultas::all(),
            'data_prodi' => Prodi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        $validated = $request->validated();
        Kelas::create($validated);
        return redirect()->route('data-kelas.index')->with('success', 'Berhasil menambahkan data kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('e-learning.data-universitas.show.show-kelas', [
            'title' => 'Detail Kelas',
            'data_kelas' => Kelas::where('id', $id)->get()->first(),
            'data_mahasiswa' => Mahasiswa::where('id_kelas', $id)->latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('e-learning.data-universitas.edit.edit-kelas', [
            'title' => 'Edit Data Kelas',
            'data_kelas' => Kelas::where('id', $id)->get()->first(),
            'dosen_pa' => Dosen::all(),
            'data_kampus' => Kampus::all(),
            'data_fakultas' => Fakultas::all(),
            'data_prodi' => Prodi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_kelas' => 'required|min:5|max:20|unique:kelas,kode_kelas,' . $id,
            'nama_kelas' => 'required|max:255|unique:kelas,nama_kelas,' . $id,
            'daya_tampung' => 'required|min:2|max:3',
            'status' => 'required',
            'id_fk' => 'required',
            'id_prodi' => 'required',
            'id_kampus' => 'required',
            'id_dosen_pa' => 'required'
        ], [
            'kode_kelas.required' => 'Kode kelas wajib di isi',
            'kode_kelas.min' => 'Kode kelas minimal berisi 5 digit',
            'kode_kelas.max' => 'Kode kelas maximal berisi 20 digit',
            'kode_kelas.unique' => 'Kode kelas sudah pernah digunakan',
            'nama_kelas.required' => 'Nama kelas wajib di isi',
            'nama_kelas.max' => 'Nama kelas terlalu panjang',
            'nama_kelas.unique' => 'Nama kelas sudah pernah digunakan',
            'daya_tampung.required' => 'Daya tampung kelas wajib di isi',
            'daya_tampung.min' => 'Daya tampung minimal berisi 2 digit angka',
            'daya_tampung.max' => 'Daya tampung maximal berisi 3 digit angka',
            'status.required' => 'Status wajib di isi',
            'id_fk.required' =>  'Fakultas wajib di pilih',
            'id_prodi.required' =>  'Program studi wajib di pilih',
            'id_kampus.required' => 'Kampus wajib di pilih',
            'id_dosen_pa.required' => 'Dosen pembimbing akademik wajib di pilih'
        ]);

        $kelas = Kelas::find($id);
        $kelas->update($validated);
        return redirect()->route('data-kelas.index')->with('success', 'Berhasil memperbarui data kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::destroy($id);
        return redirect()->route('data-kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
