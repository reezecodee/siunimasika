<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKampusRequest;
use App\Http\Requests\UpdateKampusRequest;
use App\Models\Kampus;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('e-learning.data-universitas.kampus', [
            'title' => 'Daftar Data Kampus',
            'data_kampus' => Kampus::all()
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
    public function store(StoreKampusRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo-kampus'), $fileName);
            $validated['picture'] = $fileName;
        }

        Kampus::create($validated);
        return redirect()->route('data-kampus.index')->withSuccess('Berhasil menambahkan data kampus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('e-learning.data-universitas.show.show-kampus', [
            'title' => 'Detail Kampus',
            'data_kampus' => Kampus::where('id', $id)->get()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('e-learning.data-universitas.edit.edit-kampus', [
            'title' => 'Edit Data Kampus',
            'data_kampus' => Kampus::where('id', $id)->get()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKampusRequest $request, string $id)
    {
        $validated = $request->validated();

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo-kampus'), $fileName);
            $validated['picture'] = $fileName;
        }

        $kampus = Kampus::find($id);
        $kampus->update($validated);
        return redirect()->route('data-kampus.index')->withSuccess('Berhasil memperbarui data kampus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kampus::destroy($id);
        return redirect()->route('data-kampus.index')->withSuccess('Data universitas berhasil dihapus.');
    }
}
