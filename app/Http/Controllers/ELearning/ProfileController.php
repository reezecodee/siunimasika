<?php

namespace App\Http\Controllers\ELearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('e-learning.profile', [
            'title' => 'Profile saya'
        ]);
    }
}
