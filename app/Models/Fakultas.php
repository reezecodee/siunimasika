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

    public function universitas(): BelongsTo
    {
        return $this->belongsTo(Universitas::class, 'id_kampus');
    }

    public function prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'id_fk');
    }
}
