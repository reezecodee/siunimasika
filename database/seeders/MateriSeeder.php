<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materis')->insert([
            [
                'id_matkul' => 1,
                'id_prodi' => 1,
                'id_dosen' => 3,
                'judul' => 'Materi pembelajaran untuk pertemuan 1',
                'deskripsi' => 'Pelajari saja',
                'link_materi' => 'https://unimasika.ac.id/download/module/wp/pertemuan1',
                'pertemuan' => 'Pertemuan 1',
                'semester' => 'Semester 1',
                'tipe_materi' => 'Pertemuan'
            ],
            [
                'id_matkul' => 1,
                'id_prodi' => 1,
                'id_dosen' => 3,
                'judul' => 'Materi tambahan untuk pertemuan 1',
                'deskripsi' => 'Pelajari saja',
                'link_materi' => 'https://unimasika.ac.id/download/module/wp/pertemuan1',
                'pertemuan' => 'Pertemuan 1',
                'semester' => 'Semester 1',
                'tipe_materi' => 'Tambahan'
            ]
        ]);
    }
}
