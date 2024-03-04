<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengerjaan extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function penugasan(): BelongsTo
    {
        return $this->belongsTo(Penugasan::class, 'id_tugas');
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
