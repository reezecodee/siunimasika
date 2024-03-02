<?php

namespace App\Http\Controllers\ELearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('e-learning.dashboard', [
            'title' => 'Dashboard E-Learning',
        ]);
    }
}
