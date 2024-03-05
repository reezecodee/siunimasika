<?php

namespace App\Http\Controllers\ELearning\DataUniversitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnivRequest;
use App\Http\Requests\UpdateUnivRequest;
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
        return view('e-learning.data-universitas.edit.edit-kampus', [
            'title' => 'Edit Data Kampus',
            'dataKampus' => Universitas::where('id', $id)->get()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_pt' => 'required|min:5|max:20|unique:universitas,kode_pt,' . $id,
            'nama_pt' => 'required|max:255|unique:universitas,nama_pt,' . $id,
            'kategori' => 'required',
            'status' => 'required',
            'tanggal_berdiri' => 'required',
            'telepon' => 'required|unique:universitas,telepon,' . $id,
            'email' => 'required|email|unique:universitas,email,' . $id,
            'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required',
        ], [
            'kode_pt.required' => 'Kode perguruan tinggi wajib di isi',
            'kode_pt.min' => 'Kode perguruan tinggi minimal berisi 5 digit',
            'kode_pt.max' => 'Kode perguruan tinggi maximal berisi 20 digit',
            'kode_pt.unique' => 'Kode perguruan tinggi sudah pernah digunakan',
            'nama_pt.required' => 'Nama perguruan tinggi wajib di isi',
            'nama_pt.max' => 'Nama perguruan tinggi terlalu panjang',
            'nama_pt.unique' => 'Nama perguruan tinggi sudah pernah digunakan',
            'kategori.required' => 'Kategori wajib di isi',
            'status.required' => 'Status wajib di isi',
            'tanggal_berdiri.required' => 'Tanggal berdiri kampus wajib di isi',
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

        $universitas = Universitas::find($id);
        $universitas->update($validated);
        return redirect('/e-learning/data-kampus')->with('success', 'Berhasil memperbarui data kampus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Universitas::destroy($id);
        return redirect()->route('data-kampus.index')->with('success', 'Data universitas berhasil dihapus.');
    }
}
