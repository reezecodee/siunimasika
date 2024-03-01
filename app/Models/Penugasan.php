<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penugasan extends Model
{
    use HasFactory;

    public function matkul(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul');
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function pengerjaan(): HasMany
    {
        return $this->hasMany(Pengerjaan::class, 'id_tugas');
    }
}
