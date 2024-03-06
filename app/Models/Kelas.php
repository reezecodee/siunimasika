<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function dosenPA(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen_pa');
    }

    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'id_kelas');
    }

    public function matkul(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'id_kelas');
    }

    public function penugasan(): HasMany
    {
        return $this->hasMany(Penugasan::class, 'id_matkul');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'id_kelas');
    }

    public function universitas(): BelongsTo
    {
        return $this->belongsTo(Universitas::class, 'id_kampus');
    }

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fk');
    }
}
