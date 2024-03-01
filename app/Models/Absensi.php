<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_kelas');
    }

    public function matkul(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul');
    }
}
