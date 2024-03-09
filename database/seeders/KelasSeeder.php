<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kampus;
use App\Models\Kelas;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_kampus' => Kampus::orderBy('id')->skip(0)->first()['id'],
                'id_fk' => Fakultas::orderBy('id')->skip(0)->first()['id'],
                'id_prodi' => Prodi::orderBy('id')->skip(0)->first()['id'],
                'id_dosen_pa' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'kode_kelas' => '3423423',
                'nama_kelas' => 'S1 Sistem Informasi 1A',
                'daya_tampung' => 35,
                'status' => 'Aktif'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Kelas::create($items[$i]);
        }
    }
}
