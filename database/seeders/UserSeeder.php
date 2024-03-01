<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nip_nim' => '19230825',
                'email' => 'test1@gmail.com',
                'telp' => '081298897305',
                'role' => 'Admin Pusat',
                'password' => Hash::make('acumalaka')
            ],
            [
                'nip_nim' => '19230826',
                'email' => 'test2@gmail.com',
                'telp' => '081298897306',
                'role' => 'Admin Kampus',
                'password' => Hash::make('acumalaka')
            ],
            [
                'nip_nim' => '19230827',
                'email' => 'test3@gmail.com',
                'telp' => '081298897307',
                'role' => 'Dosen',
                'password' => Hash::make('acumalaka')
            ],
            [
                'nip_nim' => '19230828',
                'email' => 'test4@gmail.com',
                'telp' => '081298897308',
                'role' => 'Mahasiswa',
                'password' => Hash::make('acumalaka')
            ],
        ]);
    }
}
