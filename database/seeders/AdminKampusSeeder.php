<?php

namespace Database\Seeders;

use App\Models\AdminKampus;
use App\Models\Universitas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class AdminKampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_user' => User::orderBy('id')->skip(1)->first()['id'],
                'id_kampus' => Universitas::orderBy('id')->skip(0)->first()['id'],
                'nama' => 'Mahmudin Amin S.kom',
                'jk' => 'Laki-laki',
                'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
                'photo_profile' => 'default.jpg',
                'status' => 'Aktif'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            AdminKampus::create($items[$i]);
        }
    }
}
