<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kampus;
use App\Models\Prodi;
use App\Models\Universitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_fk' => Fakultas::orderBy('id')->skip(0)->first()['id'],
                'id_kaprodi' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'kode_prodi' => 'SI2123',
                'jenjang' => 'S1',
                'nama_prodi' => 'Sistem Informasi',
                'status' => 'Aktif',
                // 'picture' => 'https://unimasika.ac.id/logo-prodi'
            ],
            [
                'id_fk' => Fakultas::orderBy('id')->skip(0)->first()['id'],
                'id_kaprodi' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'kode_prodi' => 'SI2127',
                'jenjang' => 'D3',
                'nama_prodi' => 'Teknik Informatika',
                'status' => 'Tidak aktif',
                // 'picture' => 'https://unimasika.ac.id/logo-prodi'
            ],
        ];

        for ($i = 0; $i < count($items); $i++) {
            Prodi::create($items[$i]);
        }
    }
}
