<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnivRequest;
use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\Universitas;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('e-learning.data-universitas.kampus', [
            'title' => 'Daftar Data Kampus',
            'data_kampus' => Universitas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('e-learning.data-universitas.create.create-kampus', [
            'title' => 'Tambah Kampus Baru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnivRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img/logo-kampus', $fileName);
            $validated['picture'] = $fileName;
        }

        Universitas::create($validated);
        return redirect('/e-learning/data-kampus')->with('success', 'Berhasil menambahkan data kampus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('e-learning.data-universitas.show.show-kampus', [
            'title' => 'Detail Kampus',
            'dataKampus' => Universitas::where('id', $id)->get()->first(),
            'dataFakultas' => Fakultas::where('id_kampus', $id)->latest()->get(),
            'dataProdi' => Prodi::where('id_kampus', $id)->latest()->get(),
            'dataKelas' => Kelas::where('id_kampus', $id)->latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
