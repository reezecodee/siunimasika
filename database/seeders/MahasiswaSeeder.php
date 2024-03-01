<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'id_user' => 4,
                'id_kampus' => 1,
                'id_prodi' => 1,
                'id_kelas' => 1,
                'nama' => 'Budi Nur Madinah',
                'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
                'photo_profile' => 'default.jpg',
                'status' => 'Aktif',
                'tahun_masuk' => '2023',
                'semester' => 'Semester 2',
            ]
        ]);
    }
}
