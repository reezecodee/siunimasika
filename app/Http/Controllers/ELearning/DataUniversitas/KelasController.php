<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kampus;

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
            'data_prodi' => Prodi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        $validated = $request->validated();
        $array = explode(' - ', $validated['id_prodi']);
        $validated['id_prodi'] = $array[0];
        $validated['id_fk'] = $array[1];

        Kelas::create($validated);
        return redirect()->route('data-kelas.index')->withSuccess('Berhasil menambahkan data kelas');
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
    public function update(UpdateKelasRequest $request, string $id)
    {
        $validated = $request->validated();

        $array = explode(' - ', $validated['id_prodi']);
        $validated['id_prodi'] = $array[0];
        $validated['id_fk'] = $array[1];

        $kelas = Kelas::find($id);
        $kelas->update($validated);
        return redirect()->route('data-kelas.index')->withSuccess('Berhasil memperbarui data kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::destroy($id);
        return redirect()->route('data-kelas.index')->withSuccess('Data kelas berhasil dihapus.');
    }
}
