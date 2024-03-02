<?php

namespace App\Providers;

use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layouts.elearning-layout', 'e-learning.*', 'siakad.*'], function ($view) {
            // Memeriksa apakah pengguna telah terotentikasi
            if (Auth::check() && Auth::user()->role == "Admin Pusat") {
                $view->with('dataUser', json_decode(Auth::user()->adminPusat, true)[0]);
            } else if (Auth::check() && Auth::user()->role == "Admin Kampus") {
                $view->with('dataUser', json_decode(Auth::user()->adminKampus, true)[0]);
            } else if (Auth::check() && Auth::user()->role == "Dosen") {
                $view->with('dataUser', json_decode(Auth::user()->dosen, true)[0]);
            } else if (Auth::check() && Auth::user()->role == "Mahasiswa") {
                $view->with('dataUser', json_decode(Auth::user()->mahasiswa, true)[0]);
            } else {
                abort(403);
            }
        });
    }
}
