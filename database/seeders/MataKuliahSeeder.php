<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliahs')->insert([
            [
                'id_prodi' => 1,
                'id_kelas' => 1,
                'id_dosen' => 1,
                'kode_mk' => 'WP12312',
                'nama_mk' => 'Web Programming I',
                'semester' => 'Semester 1'
            ]
        ]);
    }
}
