<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Universitas extends Model
{
    use HasFactory;

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
}
