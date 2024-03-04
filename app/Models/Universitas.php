<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Universitas extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['kode_pt'];

    public function fakultas(): HasMany
    {
        return $this->hasMany(Fakultas::class, 'id_kampus');
    }

    public function adminKampus(): HasMany
    {
        return $this->hasMany(AdminKampus::class, 'id_kampus');
    }

    public function dosen(): HasMany
    {
        return $this->hasMany(Dosen::class, 'id_kampus');
    }

    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'id_kampus');
    }

    public function prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'id_kampus');
    }
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_kampus');
    }
}
