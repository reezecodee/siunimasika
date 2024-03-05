<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ELearning\DashboardController;
use App\Http\Controllers\ELearning\DataUniversitas\FakultasController;
use App\Http\Controllers\ELearning\DataUniversitas\KampusController;
use App\Http\Controllers\ELearning\DataUniversitas\KelasController;
use App\Http\Controllers\ELearning\DataUniversitas\ProdiController;

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
});

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');




/* 
-----------------------------------------------------------------------------
/ E-learning Routes
-----------------------------------------------------------------------------
*/

Route::prefix('/e-learning')->middleware(['auth'])->group(function () {
    // route get
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('e-learn.dashboard');

    // route resource
    Route::resource('/data-kampus', KampusController::class);
    Route::resource('/data-fakultas', FakultasController::class);
    Route::resource('/data-prodi', ProdiController::class);
    Route::resource('/data-kelas', KelasController::class);
    Route::put('/data-kampus/{id}', [KampusController::class, 'update']);
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
