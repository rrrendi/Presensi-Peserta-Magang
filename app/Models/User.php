<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke Presensi
    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'pengguna_id');
    }

    // Relasi ke Izin
    public function izin()
    {
        return $this->hasMany(Izin::class, 'pengguna_id');
    }

    // Helper method untuk cek role
    public function isPesertaMagang()
    {
        return $this->role === 'peserta_magang';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}