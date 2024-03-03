<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('kelas')->insert([
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_prodi' => DB::table('prodis')->select('id')->get()->all()[0],
        //         'id_dosen_pa' => DB::table('dosens')->select('id')->get()->all()[0],
        //         'kode_kelas' => '3423423',
        //         'nama_kelas' => 'S1 Sistem Informasi 1A',
        //         'daya_tampung' => 35,
        //         'status' => 'Aktif'
        //     ]
        // ]);

        $items = [
            [
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

        echo 'Sukses menambahkan';
    }
}
