<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminPusat;
use App\Models\Pengerjaan;
use App\Models\Penugasan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            UniversitasSeeder::class,
            DosenSeeder::class,
            FakultasSeeder::class,
            ProdiSeeder::class,
            KelasSeeder::class,
            MahasiswaSeeder::class,
            MataKuliahSeeder::class,
            PenugasanSeeder::class,
            PengerjaanSeeder::class,
            MateriSeeder::class,
            AdminPusatSeeder::class,
            AdminKampusSeeder::class,
        ]);
    }
}
