<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdiRequest;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Kampus;
use Illuminate\Http\Request;

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
            'data_fakultas' => Fakultas::all()->unique('nama_fk'),
            'data_kampus' => Kampus::all(),
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
            $file->storeAs('public/img/logo-prodi', $fileName);
            $validated['picture'] = $fileName;
        }

        Prodi::create($validated);
        return redirect()->route('data-prodi.index')->with('success', 'Berhasil menambahkan data prgram studi');
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
            'data_kampus' => Kampus::all(),
            'data_prodi' => Prodi::where('id', $id)->get()->first(),
            'daftar_prodi' => Prodi::where('id', $id)->get(),
            'data_kaprodi' => Dosen::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_prodi' => 'required|min:5|max:20|unique:prodis,kode_prodi,' . $id,
            'nama_prodi' => 'required|max:255|unique:prodis,nama_prodi,' . $id,
            'jenjang' => 'required|min:2|max:2',
            'status' => 'required',
            'id_fk' => 'required',
            'id_kampus' => 'required',
            'id_kaprodi' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'kode_prodi.required' => 'Kode prodi wajib di isi',
            'kode_prodi.min' => 'Kode prodi minimal berisi 5 digit',
            'kode_prodi.max' => 'Kode prodi maximal berisi 20 digit',
            'kode_prodi.unique' => 'Kode prodi sudah pernah digunakan',
            'nama_prodi.required' => 'Nama prodi wajib di isi',
            'nama_prodi.max' => 'Nama prodi terlalu panjang',
            'nama_prodi.unique' => 'Nama prodi sudah pernah digunakan',
            'jenjang.min' => 'Jenjang harus berisi 2 digit',
            'jenjang.max' => 'Jenjang terlalu panjang, harus berisi 2 digit',
            'status.required' => 'Status fakultas wajib di isi',
            'id_fk.required' => 'Tidak ada fakultas yang di pilih, permintaan ditolak',
            'id_kaprodi.required' => 'Tidak ada kaprodi yang di pilih, permintaan ditolak',
            'id_kampus.required' => 'Tidak ada kampus yang di pilih, permintaan ditolak',
            'picture.image' => 'File harus berupa gambar',
            'picture.mimes' => 'Format ekstensi gambar yang didukung adalah jpeg, png, dan jpg',
            'picture.max' => 'Size gambar maksimal 2MB',
        ]);

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img/logo-prodi', $fileName);
            $validated['picture'] = $fileName;
        }

        $prodi = Prodi::find($id);
        $prodi->update($validated);
        return redirect()->route('data-prodi.index')->with('success', 'Berhasil memperbarui data program studi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::destroy($id);
        return redirect()->route('data-prodi.index')->with('success', 'Data program studi berhasil dihapus.');
    }
}
