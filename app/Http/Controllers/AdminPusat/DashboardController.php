<?php

namespace App\Http\Controllers\AdminPusat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin-pusat.dashboard', [
            'title' => 'Dashboard - Admin Pusat',
            'dataUser' => json_decode(auth()->user()->adminPusat, true)[0],
        ]);
    }
}
