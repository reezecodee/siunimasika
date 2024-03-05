<?php

namespace Database\Seeders;

use App\Models\Universitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UniversitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'kode_pt' => 'PTS10234892',
                'nama_pt' => 'Universitas Transformasi Informatika',
                'kategori' => 'Pusat',
                'status' => 'Aktif',
                'tanggal_berdiri' => '25 Mei 2005',
                'telepon' => '+62 123 4567 8910',
                'email' => 'unimasika.pusat@unimasika.ac.id',
                // 'picture' => 'https://unimasika.ac.id/logo',
                'alamat' => 'Jl. Jendral Soedirman, Semanggi, Kota Jakarta Pusat, Jakarta 46389'
            ],
            [
                'kode_pt' => 'PTS10234893',
                'nama_pt' => 'Universitas Transformasi Informatika PSDKU Kota Tasikmalaya',
                'kategori' => 'PSDKU',
                'status' => 'Aktif',
                'tanggal_berdiri' => '25 Mei 2006',
                'telepon' => '+62 123 4567 8911',
                'email' => 'unimasika.tasik@unimasika.ac.id',
                // 'picture' => 'https://unimasika.ac.id/logo',
                'alamat' => 'Jl. Tanuwijaya, Tawang, Kota Tasikmalaya, Jawa Barat 46389'
            ],
            [
                'kode_pt' => 'PTS10234894',
                'nama_pt' => 'Universitas Transformasi Informatika PSDKU Kota Bandung',
                'kategori' => 'PSDKU',
                'status' => 'Tidak aktif',
                'tanggal_berdiri' => '25 Mei 2007',
                'telepon' => '+62 123 4567 8912',
                'email' => 'unimasika.bandung@unimasika.ac.id',
                // 'picture' => 'https://unimasika.ac.id/logo',
                'alamat' => 'Jl. Ahmad yani, Bandung, Kota Bandung, Jawa Barat 46388'
            ],
        ];

        for ($i = 0; $i < count($items); $i++) {
            Universitas::create($items[$i]);
        }
    }
}
