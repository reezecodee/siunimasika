<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Pengerjaan;
use App\Models\Penugasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PengerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_tugas' => Penugasan::orderBy('id')->skip(0)->first()['id'],
                'id_mahasiswa' => Mahasiswa::orderBy('id')->skip(0)->first()['id'],
                'kode_pengerjaan' => '1239123',
                'link_tugas' => 'https://unimasika.ac.id/ini-tugasnya',
                'status' => 'Dikerjakan',
                'nilai' => '100',
                'komentar_dosen' => 'Kamu anak yang pintar',
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Pengerjaan::create($items[$i]);
        }

        echo 'Sukses menambahkan';
    }
}
