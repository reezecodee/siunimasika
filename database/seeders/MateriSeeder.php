<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Materi;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('materis')->insert([
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_matkul' => DB::table('mata_kuliahs')->select('id')->get()->all()[0],
        //         'id_prodi' => DB::table('prodis')->select('id')->get()->all()[0],
        //         'id_dosen' => DB::table('dosens')->select('id')->get()->all()[0],
        //         'judul' => 'Materi pembelajaran untuk pertemuan 1',
        //         'deskripsi' => 'Pelajari saja',
        //         'link_materi' => 'https://unimasika.ac.id/download/module/wp/pertemuan1',
        //         'pertemuan' => 'Pertemuan 1',
        //         'semester' => 'Semester 1',
        //         'tipe_materi' => 'Pertemuan'
        //     ],
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_matkul' => DB::table('mata_kuliahs')->select('id')->get()->all()[0],
        //         'id_prodi' => DB::table('prodis')->select('id')->get()->all()[0],
        //         'id_dosen' => DB::table('dosens')->select('id')->get()->all()[0],
        //         'judul' => 'Materi tambahan untuk pertemuan 1',
        //         'deskripsi' => 'Pelajari saja',
        //         'link_materi' => 'https://unimasika.ac.id/download/module/wp/pertemuan1',
        //         'pertemuan' => 'Pertemuan 1',
        //         'semester' => 'Semester 1',
        //         'tipe_materi' => 'Tambahan'
        //     ]
        // ]);

        $items = [
            [
                'id_matkul' => MataKuliah::orderBy('id')->skip(0)->first()['id'],
                'id_prodi' => Prodi::orderBy('id')->skip(0)->first()['id'],
                'id_dosen' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'judul' => 'Materi pembelajaran untuk pertemuan 1',
                'deskripsi' => 'Pelajari saja',
                'link_materi' => 'https://unimasika.ac.id/download/module/wp/pertemuan1',
                'pertemuan' => 'Pertemuan 1',
                'semester' => 'Semester 1',
                'tipe_materi' => 'Pertemuan'
            ],
            [
                'id_matkul' => MataKuliah::orderBy('id')->skip(0)->first()['id'],
                'id_prodi' => Prodi::orderBy('id')->skip(0)->first()['id'],
                'id_dosen' => Dosen::orderBy('id')->skip(0)->first()['id'],
                'judul' => 'Materi tambahan untuk pertemuan 1',
                'deskripsi' => 'Pelajari saja',
                'link_materi' => 'https://unimasika.ac.id/download/module/wp/pertemuan1',
                'pertemuan' => 'Pertemuan 1',
                'semester' => 'Semester 1',
                'tipe_materi' => 'Tambahan'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Materi::create($items[$i]);
        }

        echo 'Sukses menambahkan';
    }
}
