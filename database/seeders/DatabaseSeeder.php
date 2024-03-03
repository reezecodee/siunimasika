<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            FakultasSeeder::class,
            DosenSeeder::class,
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
