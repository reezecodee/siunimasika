<?php

namespace Database\Seeders;

use App\Models\Kampus;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Universitas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_user' => User::orderBy('id')->skip(3)->first()['id'],
                'id_kampus' => Kampus::orderBy('id')->skip(0)->first()['id'],
                'id_prodi' => Prodi::orderBy('id')->skip(0)->first()['id'],
                'id_kelas' => Kelas::orderBy('id')->skip(0)->first()['id'],
                'nama' => 'Budi Nur Madinah',
                'jk' => 'Laki-laki',
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
    }
}
