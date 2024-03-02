<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenugasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penugasans')->insert([
            [
                'id_matkul' => 1,
                'id_kelas' => 1,
                'id_dosen' => 1,
                'kode_tugas' => '1231431',
                'judul' => 'Buat program perulangan menggunakan for statement',
                'deskripsi' => 'Ini adalah deskripsinya',
                'link_tugas' => 'https://unimasika.ac.id/ini-adalah-tugas',
                'mulai' => '2 Maret 2024',
                'deadline' => '11 April 2024',
                'status' => 'Dibuka'
            ]
        ]);
    }
}
