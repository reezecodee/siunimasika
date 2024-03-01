<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'id_prodi' => 1,
                'id_dosen_pa' => 3,
                'kode_kelas' => '3423423',
                'nama_kelas' => 'S1 Sistem Informasi 1A',
                'daya_tampung' => 35,
                'status' => 'Aktif'
            ]
        ]);
    }
}
