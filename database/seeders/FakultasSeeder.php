<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Universitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('fakultas')->insert([
        //     [
        //         'id' => Uuid::uuid4()->toString(),
        //         'id_kampus' => DB::table('universitas')->select('id')->get()->all()[0],
        //         'kode_fk' => 'TK12312',
        //         'nama_fk' => 'Teknik',
        //         'status' => 'Aktif',
        //         'logo_fk' => 'https://unimasika.ac.id/logo-fk'
        //     ]
        // ]);

        $items = [
            [
                'id_kampus' => Universitas::orderBy('id')->skip(0)->first()['id'],
                'kode_fk' => 'TK12312',
                'nama_fk' => 'Teknik',
                'status' => 'Aktif',
                'logo_fk' => 'https://unimasika.ac.id/logo-fk'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            Fakultas::create($items[$i]);
        }

        echo 'Sukses menambahkan';
    }
}
