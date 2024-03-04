<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Penugasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PenugasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_matkul' => MataKuliah::orderBy('id')->skip(0)->first()['id'],
                'id_kelas' => Kelas::orderBy('id')->skip(0)->first()['id'],
                'id_dosen' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'kode_tugas' => '1231431',
                'judul' => 'Buat program perulangan menggunakan for statement',
                'deskripsi' => 'Ini adalah deskripsinya',
                'link_tugas' => 'https://unimasika.ac.id/ini-adalah-tugas',
                'mulai' => '2 Maret 2024',
                'deadline' => '11 April 2024',
                'status' => 'Dibuka'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Penugasan::create($items[$i]);
        }
    }
}
