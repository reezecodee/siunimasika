<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nip_nim',
        'email',
        'telp',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function adminPusat(): HasMany
    {
        return $this->hasMany(AdminPusat::class, 'id_user');
    }

    public function adminKampus(): HasMany
    {
        return $this->hasMany(AdminKampus::class, 'id_user');
    }

    public function dosen(): HasMany
    {
        return $this->hasMany(Dosen::class, 'id_user');
    }
    
    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'id_user');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'id_user');
    }
}
