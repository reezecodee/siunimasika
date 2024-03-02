<?php

use App\Http\Controllers\AdminPusat\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/login', [AuthController::class, 'index'])->name('auth.loginView');
Route::post('/login', [AuthController::class, 'loginHandler'])->name('auth.loginHandler');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


/* 
-----------------------------------------------------------------------------
/ Admin Pusat Routes
-----------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('adminPusat.dashboard');