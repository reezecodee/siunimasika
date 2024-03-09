<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnivRequest;
use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Kampus;
use Illuminate\Http\Request;

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
    public function store(StoreUnivRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img/logo-kampus', $fileName);
            $validated['picture'] = $fileName;
        }

        Kampus::create($validated);
        return redirect()->route('data-kampus.index')->with('success', 'Berhasil menambahkan data kampus');
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
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_kampus' => 'required|min:5|max:20|unique:kampuses,kode_kampus,' . $id,
            'nama_kampus' => 'required|max:255|unique:kampuses,nama_kampus,' . $id,
            'kategori' => 'required',
            'status' => 'required',
            'telepon' => 'required|unique:kampuses,telepon,' . $id,
            'email' => 'required|email|unique:kampuses,email,' . $id,
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required',
        ], [
            'kode_kampus.required' => 'Kode kampus wajib di isi',
            'kode_kampus.min' => 'Kode kampus minimal berisi 5 digit',
            'kode_kampus.max' => 'Kode kampus maximal berisi 20 digit',
            'kode_kampus.unique' => 'Kode kampus sudah pernah digunakan',
            'nama_kampus.required' => 'Nama kampus wajib di isi',
            'nama_kampus.max' => 'Nama kampus terlalu panjang',
            'nama_kampus.unique' => 'Nama kampus sudah pernah digunakan',
            'kategori.required' => 'Kategori wajib di isi',
            'status.required' => 'Status wajib di isi',
            'telepon.required' => 'No telepon wajib di isi',
            'telepon.unique' => 'No telepon sudah pernah digunakan',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Data bukan email',
            'email.unique' => 'Email sudah pernah digunakan',
            'picture.image' => 'File harus berupa gambar.',
            'picture.mimes' => 'Format ekstensi gambar yang didukung adalah jpeg, png, dan jpg',
            'picture.max' => 'Size gambar maksimal 2MB',
            'alamat.required' => 'Alamat wajib di isi',
        ]);

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img/logo-kampus', $fileName);
            $validated['picture'] = $fileName;
        }

        $kampus = Kampus::find($id);
        $kampus->update($validated);
        return redirect()->route('data-kampus.index')->with('success', 'Berhasil memperbarui data kampus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kampus::destroy($id);
        return redirect()->route('data-kampus.index')->with('success', 'Data universitas berhasil dihapus.');
    }
}
