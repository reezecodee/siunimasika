<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'id_kelas');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function materi(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'id_matkul');
    }

    public function penugasan(): HasMany
    {
        return $this->hasMany(Penugasan::class, 'id_matkul');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'id_matkul');
    }
}
