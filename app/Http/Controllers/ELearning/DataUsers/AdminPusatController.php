<?php

namespace App\Http\Controllers\ELearning\DataUsers;

use App\Http\Controllers\Controller;
use App\Models\AdminPusat;
use App\Models\Universitas;
use Illuminate\Http\Request;

class AdminPusatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('e-learning.data-users.admin-pusat', [
            'title' => 'Daftar Data Admin Pusat',
            'data_admin_pusat' => AdminPusat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('e-learning.data-users.create.create-admin-pusat', [
            'title' => 'Tambah Admin Pusat',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('e-learning.data-users.show.show-admin-pusat', [
            'title' => 'Detail Admin Pusat',
            'data' => AdminPusat::where('id', $id)->get()->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('e-learning.data-users.edit.edit-admin-pusat', [
            'title' => 'Edit Admin Pusat',
            'data' => AdminPusat::where('id', $id)->get()->first()
        ]);
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
