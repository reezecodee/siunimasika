<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ELearning\DashboardController;
use App\Http\Controllers\ELearning\ProfileController;
use App\Http\Controllers\ELearning\DataUniversitas\FakultasController;
use App\Http\Controllers\ELearning\DataUniversitas\KampusController;
use App\Http\Controllers\ELearning\DataUniversitas\KelasController;
use App\Http\Controllers\ELearning\DataUniversitas\ProdiController;
use App\Http\Controllers\ELearning\DataUsers\AdminKampusController;
use App\Http\Controllers\ELearning\DataUsers\AdminPusatController;
use App\Http\Controllers\ELearning\DataUsers\DosenController;
use App\Http\Controllers\ELearning\DataUsers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* 
-----------------------------------------------------------------------------
/ Auth Routes
-----------------------------------------------------------------------------
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.loginView');
    Route::post('/login', [AuthController::class, 'loginHandler'])->name('auth.loginHandler');
    Route::get('/lupa-password', [AuthController::class, 'forgetPassword'])->name('auth.lupa-password');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');




/* 
-----------------------------------------------------------------------------
/ E-learning Routes
-----------------------------------------------------------------------------
*/

Route::prefix('e-learning')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('e-learn.dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('e-learn.profile');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('e-learn.update-profile');
    Route::post('profile', [ProfileController::class, 'changePassword'])->name('e-learn.change-password');

    // route resource data universitas
    Route::resource('data-kampus', KampusController::class);
    Route::resource('data-fakultas', FakultasController::class);
    Route::resource('data-prodi', ProdiController::class);
    Route::resource('data-kelas', KelasController::class);

    // route resource data users
    Route::resource('data-admin-pusat', AdminPusatController::class);
    Route::resource('data-admin-kampus', AdminKampusController::class);
    Route::resource('data-dosen', DosenController::class);
    Route::resource('data-mahasiswa', MahasiswaController::class);
});





/* 
-----------------------------------------------------------------------------
/ SIAKAD Routes
-----------------------------------------------------------------------------
*/





/* 
-----------------------------------------------------------------------------
/ Profile Routes
-----------------------------------------------------------------------------
*/
