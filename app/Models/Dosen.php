<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dosen extends Model
{
    use HasFactory, HasUuids;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function universitas(): BelongsTo
    {
        return $this->belongsTo(Universitas::class, 'id_kampus');
    }

    public function kelas(): HasOne
    {
        return $this->hasOne(Kelas::class, 'id_dosen_pa');
    }

    public function matkul(): HasOne
    {
        return $this->hasOne(Kelas::class, 'id_dosen');
    }

    public function materi(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'id_dosen');
    }

    public function penugasan(): HasMany
    {
        return $this->hasMany(Penugasan::class, 'id_matkul');
    }

    public function fakultas(): HasMany
    {
        return $this->hasMany(Fakultas::class, 'id_dekan');
    }

    public function prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'id_kaprodi');
    }
}
