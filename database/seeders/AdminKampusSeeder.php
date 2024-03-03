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
        // DB::table('admin_kampuses')->insert([
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_user' => DB::table('users')->select('id')->get()->all()[1],
        //         'id_kampus' => DB::table('universitas')->select('id')->get()->all()[0],
        //         'nama' => 'Mahmudin Amin S.kom',
        //         'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
        //         'photo_profile' => 'default.jpg',
        //         'status' => 'Aktif'
        //     ]
        // ]);
    
        $items = [
            [
                'id_user' => User::orderBy('id')->skip(1)->first()['id'],
                'id_kampus' => Universitas::orderBy('id')->skip(0)->first()['id'],
                'nama' => 'Mahmudin Amin S.kom',
                'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
                'photo_profile' => 'default.jpg',
                'status' => 'Aktif'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            AdminKampus::create($items[$i]);
        }

        echo 'Sukses menambahkan';
    }
}
