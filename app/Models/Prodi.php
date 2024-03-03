<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prodi extends Model
{
    use HasFactory, HasUuids;

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fk');
    }

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_prodi');
    }

    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'id_prodi');
    }

    public function matkul(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'id_prodi');
    }
}
