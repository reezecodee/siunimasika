<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fakultas')->insert([
            [
                'id_kampus' => 1,
                'kode_fk' => 'TK12312',
                'nama_fk' => 'Teknik',
                'status' => 'Aktif',
                'logo_fk' => 'https://unimasika.ac.id/logo-fk'
            ]
        ]);
    }
}
