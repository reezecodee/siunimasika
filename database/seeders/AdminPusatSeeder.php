<?php

namespace Database\Seeders;

use App\Models\AdminPusat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class AdminPusatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('admin_pusats')->insert([
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_user' => DB::table('users')->select('id')->get()->all()[0],
        //         'nama' => 'Muhaimin Baswedan S.E',
        //         'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
        //         'photo_profile' => 'default.jpg',
        //         'status' => 'Aktif'
        //     ]
        // ]);

        $items = [
            [
                'id_user' => User::orderBy('id')->skip(0)->first()['id'],
                'nama' => 'Muhaimin Baswedan S.E',
                'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
                'photo_profile' => 'default.jpg',
                'status' => 'Aktif'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            AdminPusat::create($items[$i]);
        }

        echo 'Sukses menambahkan';
    }
}
