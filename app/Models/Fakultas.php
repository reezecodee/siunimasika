<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fakultas extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'id_fk');
    }

    public function dekan(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dekan');
    }

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_fk');
    }
}
