<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodis')->insert([
            [
                'id_fk' => 1,
                'kode_prodi' => 'SI2123',
                'jenjang' => 'S1',
                'nama_prodi' => 'Sistem Informasi',
                'status' => 'Aktif',
                'logo_prodi' => 'https://unimasika.ac.id/logo-prodi'
            ],
            [
                'id_fk' => 1,
                'kode_prodi' => 'SI2127',
                'jenjang' => 'D3',
                'nama_prodi' => 'Teknik Informatika',
                'status' => 'Tutup',
                'logo_prodi' => 'https://unimasika.ac.id/logo-prodi'
            ],
        ]);
    }
}
