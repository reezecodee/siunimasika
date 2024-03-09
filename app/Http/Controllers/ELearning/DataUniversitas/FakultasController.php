<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFkRequest;
use App\Http\Requests\UpdateFkRequest;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Kampus;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('e-learning.data-universitas.fakultas', [
            'title' => 'Daftar Data Fakultas',
            'data_fakultas' => Fakultas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('e-learning.data-universitas.create.create-fakultas', [
            'title' => 'Tambah Fakultas Baru',
            'data_kampus' => Kampus::all(),
            'data_dekan' => Dosen::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFkRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo-fakultas'), $fileName);
            $validated['picture'] = $fileName;
        }

        Fakultas::create($validated);
        return redirect()->route('data-fakultas.index')->withSuccess('Berhasil menambahkan data fakultas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('e-learning.data-universitas.show.show-fakultas', [
            'title' => 'Detail Fakultas',
            'data_fakultas' => Fakultas::where('id', $id)->latest()->get()->first(),
            'data_prodi' => Prodi::where('id_fk', $id)->latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('e-learning.data-universitas.edit.edit-fakultas', [
            'title' => 'Edit Data Fakultas',
            'data_fakultas' => Fakultas::where('id', $id)->get()->first(),
            'data_dekan' => Dosen::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFkRequest $request, string $id)
    {
        $validated = $request->validated();

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo-fakultas'), $fileName);
            $validated['picture'] = $fileName;
        }

        $fakultas = Fakultas::find($id);
        $fakultas->update($validated);
        return redirect()->route('data-fakultas.index')->withSuccess('Berhasil memperbarui data fakultas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fakultas::destroy($id);
        return redirect()->route('data-fakultas.index')->withSuccess('Data fakultas berhasil dihapus');
    }
}
