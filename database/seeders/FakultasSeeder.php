<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_dekan' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'kode_fk' => 'TK12312',
                'nama_fk' => 'Teknik',
                'status' => 'Aktif',
                // 'picture' => 'https://unimasika.ac.id/logo-fk'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Fakultas::create($items[$i]);
        }
    }
}
