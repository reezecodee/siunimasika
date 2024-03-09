<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_prodi' => Prodi::orderBy('id')->skip(0)->first()['id'],
                'id_kelas' => Kelas::orderBy('id')->skip(0)->first()['id'],
                'id_dosen' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'kode_mk' => 'WP12312',
                'nama_mk' => 'Web Programming I',
                'semester' => 'Semester 1'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            MataKuliah::create($items[$i]);
        }
    }
}
