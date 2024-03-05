<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFkRequest;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Universitas;
use Illuminate\Http\Request;

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
            'dataKampus' => Universitas::all(),
            'dataDekan' => Dosen::all()
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
            $file->storeAs('public/img/logo-fakultas', $fileName);
            $validated['picture'] = $fileName;
        }

        Fakultas::create($validated);
        return redirect('/e-learning/data-fakultas')->with('success', 'Berhasil menambahkan data fakultas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('e-learning.data-universitas.show.show-fakultas', [
            'title' => 'Detail Fakultas',
            'dataFakultas' => Fakultas::where('id', $id)->latest()->get()->first(),
            'dataProdi' => Prodi::where('id_fk', $id)->latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('e-learning.data-universitas.edit.edit-fakultas', [
            'title' => 'Edit Data Fakultas',
            'dataKampus' => Universitas::all(),
            'dataFakultas' => Fakultas::where('id', $id)->get()->first(),
            'dataDekan' => Dosen::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'id_kampus' => 'required',
            'id_dekan' => 'required',
            'kode_fk' => 'required|min:5|max:20|unique:fakultas,kode_fk,' . $id,
            'nama_fk' => 'required|max:255|unique:fakultas,nama_fk,' . $id,
            'status' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'id_kampus.required' => 'Tidak ada kampus yang di pilih, permintaan ditolak',
            'id_dekan.required' => 'Tidak ada kampus yang di pilih, permintaan ditolak',
            'kode_fk.required' => 'Kode fakultas wajib di isi',
            'kode_fk.min' => 'Kode fakultas minimal berisi 5 digit',
            'kode_fk.max' => 'Kode fakultas maximal berisi 20 digit',
            'kode_fk.unique' => 'Kode fakultas sudah pernah digunakan',
            'nama_fk.required' => 'Nama perguruan tinggi wajib di isi',
            'nama_fk.max' => 'Nama perguruan tinggi terlalu panjang',
            'nama_fk.unique' => 'Nama perguruan tinggi sudah pernah digunakan',
            'status.required' => 'Status wajib di isi',
            'picture.image' => 'File harus berupa gambar.',
            'picture.mimes' => 'Format ekstensi gambar yang didukung adalah jpeg, png, dan jpg',
            'picture.max' => 'Size gambar maksimal 2MB',
        ]);

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img/logo-fakultas', $fileName);
            $validated['picture'] = $fileName;
        }

        $fakultas = Fakultas::find($id);
        $fakultas->update($validated);
        return redirect('/e-learning/data-fakultas')->with('success', 'Berhasil memperbarui data fakultas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fakultas::destroy($id);
        return redirect()->route('data-fakultas.index')->with('success', 'Data fakultas berhasil dihapus.');
    }
}
