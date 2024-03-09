<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\Prodi;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('e-learning.data-universitas.prodi', [
            'title' => 'Daftar Data Prodi',
            'data_prodi' => Prodi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('e-learning.data-universitas.create.create-prodi', [
            'title' => 'Tambah Program Studi Baru',
            'data_fakultas' => Fakultas::all(),
            'data_kaprodi' => Dosen::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdiRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo-prodi'), $fileName);
            $validated['picture'] = $fileName;
        }

        Prodi::create($validated);
        return redirect()->route('data-prodi.index')->withSuccess('Berhasil menambahkan data prgram studi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('e-learning.data-universitas.show.show-prodi', [
            'title' => 'Detail Program Studi',
            'data_prodi' => Prodi::where('id', $id)->get()->first(),
            'data_kelas' => Kelas::where('id_prodi', $id)->latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('e-learning.data-universitas.edit.edit-prodi', [
            'title' => 'Edit Data Prodi',
            'data_prodi' => Prodi::where('id', $id)->get()->first(),
            'daftar_prodi' => Prodi::where('id', $id)->get(),
            'data_kaprodi' => Dosen::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdiRequest $request, string $id)
    {
        $validated = $request->validated();

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo-prodi'), $fileName);
            $validated['picture'] = $fileName;
        }

        $prodi = Prodi::find($id);
        $prodi->update($validated);
        return redirect()->route('data-prodi.index')->withSuccess('Berhasil memperbarui data program studi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::destroy($id);
        return redirect()->route('data-prodi.index')->withSuccess('Data program studi berhasil dihapus.');
    }
}
