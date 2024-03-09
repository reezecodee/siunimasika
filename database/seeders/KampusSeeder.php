<?php

namespace Database\Seeders;

use App\Models\Kampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'kode_kampus' => 'PTS10234892',
                'nama_kampus' => 'Universitas Transformasi Informatika',
                'kategori' => 'Utama',
                'status' => 'Aktif',
                'telepon' => '+62 123 4567 8910',
                'email' => 'unimasika.pusat@unimasika.ac.id',
                // 'picture' => 'https://unimasika.ac.id/logo',
                'alamat' => 'Jl. Jendral Soedirman, Semanggi, Kota Jakarta Pusat, Jakarta 46389'
            ],
            [
                'kode_kampus' => 'PTS10234893',
                'nama_kampus' => 'Universitas Transformasi Informatika PSDKU Kota Tasikmalaya',
                'kategori' => 'PSDKU',
                'status' => 'Aktif',
                'telepon' => '+62 123 4567 8911',
                'email' => 'unimasika.tasik@unimasika.ac.id',
                // 'picture' => 'https://unimasika.ac.id/logo',
                'alamat' => 'Jl. Tanuwijaya, Tawang, Kota Tasikmalaya, Jawa Barat 46389'
            ],
        ];

        for ($i = 0; $i < count($items); $i++) {
            Kampus::create($items[$i]);
        }
    }
}
