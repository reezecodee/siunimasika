<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function matkul(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_dosen');
    }

    public function materi(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'id_dosen');
    }

    public function penugasan(): HasMany
    {
        return $this->hasMany(Penugasan::class, 'id_matkul');
    }
}
