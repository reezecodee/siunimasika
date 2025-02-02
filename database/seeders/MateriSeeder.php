<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Materi;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_matkul' => MataKuliah::orderBy('id')->skip(0)->first()['id'],
                'id_prodi' => Prodi::orderBy('id')->skip(0)->first()['id'],
                'id_dosen' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'judul' => 'Materi pembelajaran untuk pertemuan 1',
                'deskripsi' => 'Pelajari saja',
                'link_materi' => 'https://unimasika.ac.id/download/module/wp/pertemuan1',
                'pertemuan' => 'Pertemuan 1',
                'semester' => 'Semester 1',
                'tipe_materi' => 'Pertemuan'
            ],
            [
                'id_matkul' => MataKuliah::orderBy('id')->skip(0)->first()['id'],
                'id_prodi' => Prodi::orderBy('id')->skip(0)->first()['id'],
                'id_dosen' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'judul' => 'Materi tambahan untuk pertemuan 1',
                'deskripsi' => 'Pelajari saja',
                'link_materi' => 'https://unimasika.ac.id/download/module/wp/pertemuan1',
                'pertemuan' => 'Pertemuan 1',
                'semester' => 'Semester 1',
                'tipe_materi' => 'Tambahan'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Materi::create($items[$i]);
        }
    }
}
