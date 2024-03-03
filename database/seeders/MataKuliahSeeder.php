<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('mata_kuliahs')->insert([
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_prodi' => DB::table('prodis')->select('id')->get()->all()[0],
        //         'id_kelas' => DB::table('kelas')->select('id')->get()->all()[0],
        //         'id_dosen' => DB::table('dosens')->select('id')->get()->all()[0],
        //         'kode_mk' => 'WP12312',
        //         'nama_mk' => 'Web Programming I',
        //         'semester' => 'Semester 1'
        //     ]
        // ]);

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

        echo 'Sukses menambahkan';
    }
}
