<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'nip_nim' => '19230826',
                'email' => 'test1@gmail.com',
                'telp' => '081298897306',
                'role' => 'Admin Pusat',
                'password' => bcrypt('acumalaka')
            ],
            [
                'nip_nim' => '19230825',
                'email' => 'test2@gmail.com',
                'telp' => '081298897305',
                'role' => 'Admin Kampus',
                'password' => bcrypt('acumalaka')
            ],
            [
                'nip_nim' => '19230827',
                'email' => 'test3@gmail.com',
                'telp' => '081298897307',
                'role' => 'Dosen',
                'password' => bcrypt('acumalaka')
            ],
            [
                'nip_nim' => '19230828',
                'email' => 'test4@gmail.com',
                'telp' => '081298897308',
                'role' => 'Mahasiswa',
                'password' => bcrypt('acumalaka')
            ]
        ];
        

        for ($i = 0; $i < count($items); $i++) {
            User::create($items[$i]);
        }

        echo 'Sukses menambahkan';
    }
}
