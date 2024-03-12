<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ELearning\DashboardController;
use App\Http\Controllers\ELearning\ProfileController;
use App\Http\Controllers\ELearning\DataUniversitas\FakultasController;
use App\Http\Controllers\ELearning\DataUniversitas\KelasController;
use App\Http\Controllers\ELearning\DataUniversitas\ProdiController;
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
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'loginHandler'])->name('auth.loginHandler');
    
    Route::get('/register-admin-pusat', [RegisterController::class, 'index'])->name('auth.register');
    Route::post('/register-admin-pusat', [RegisterController::class, 'registerHandler'])->name('auth.registerHandler');

    Route::get('/lupa-password', [ForgetPasswordController::class, 'index'])->name('forget-password.index');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');




/* 
-----------------------------------------------------------------------------
/ E-learning Routes
-----------------------------------------------------------------------------
*/

Route::prefix('e-learning')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('e-learn.dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('e-learn.profile');
    Route::post('profile', [ProfileController::class, 'updateProfilePicture'])->name('e-learn.update-photo');
    Route::post('profile', [ProfileController::class, 'changePassword'])->name('e-learn.change-password');

    // route resource data universitas
    Route::resource('data-fakultas', FakultasController::class);
    Route::resource('data-prodi', ProdiController::class);
    Route::resource('data-kelas', KelasController::class);

    // route resource data users
    Route::resource('data-admin-pusat', AdminPusatController::class);
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
