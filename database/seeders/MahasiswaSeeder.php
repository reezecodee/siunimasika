<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Universitas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('mahasiswas')->insert([
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_user' => DB::table('users')->select('id')->get()->all()[3],
        //         'id_kampus' => DB::table('universitas')->select('id')->get()->all()[0],
        //         'id_prodi' => DB::table('prodis')->select('id')->get()->all()[0],
        //         'id_kelas' => DB::table('kelas')->select('id')->get()->all()[0],
        //         'nama' => 'Budi Nur Madinah',
        //         'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
        //         'photo_profile' => 'default.jpg',
        //         'status' => 'Aktif',
        //         'tahun_masuk' => '2023',
        //         'semester' => 'Semester 2',
        //     ]
        // ]);

        $items = [
            [
                'id_user' => User::orderBy('id')->skip(3)->first()['id'],
                'id_kampus' => Universitas::orderBy('id')->skip(0)->first()['id'],
                'id_prodi' => Prodi::orderBy('id')->skip(0)->first()['id'],
                'id_kelas' => Kelas::orderBy('id')->skip(0)->first()['id'],
                'nama' => 'Budi Nur Madinah',
                'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
                'photo_profile' => 'default.jpg',
                'status' => 'Aktif',
                'tahun_masuk' => '2023',
                'semester' => 'Semester 2',
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Mahasiswa::create($items[$i]);
        }

        echo 'Sukses menambahkan';
    }
}
