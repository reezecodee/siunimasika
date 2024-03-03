<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Universitas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('dosens')->insert([
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_user' => DB::table('users')->select('id')->get()->all()[2],
        //         'id_kampus' => DB::table('universitas')->select('id')->get()->all()[0],
        //         'kode_dosen' => 'MAN9213',
        //         'nama' => 'Prabowo Rakabuming S.Par',
        //         'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
        //         'photo_profile' => 'default.jpg',
        //         'status' => 'Aktif'
        //     ]
        // ]);

        $items = [
            [
                'id_user' => User::orderBy('id')->skip(2)->first()['id'],
                'id_kampus' => Universitas::orderBy('id')->skip(0)->first()['id'],
                'kode_dosen' => 'MAN9213',
                'nama' => 'Prabowo Rakabuming S.Par',
                'alamat' => 'Jl. Jalan berkah, Tasikmalaya, Jawa Barat',
                'photo_profile' => 'default.jpg',
                'status' => 'Aktif'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Dosen::create($items[$i]);
        }

        echo 'Sukses menambahkan';
    }
}
