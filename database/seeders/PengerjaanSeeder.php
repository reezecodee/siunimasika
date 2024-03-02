<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengerjaans')->insert([
            [
                'id_tugas' => 1,
                'id_mahasiswa' => 1,
                'kode_pengerjaan' => '1239123',
                'link_tugas' => 'https://unimasika.ac.id/ini-tugasnya',
                'status' => 'Dikerjakan',
                'nilai' => '100',
                'komentar_dosen' => 'Kamu anak yang pintar',
            ]
        ]);
    }
}
