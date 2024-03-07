<?php

namespace App\Http\Controllers\ELearning\DataUsers;

use App\Http\Controllers\Controller;
use App\Models\AdminPusat;
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
        //
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
        //
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
