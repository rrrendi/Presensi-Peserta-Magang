<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izin';

    protected $fillable = [
        'pengguna_id',
        'tanggal',
        'jenis_izin',
        'keterangan',
        'waktu',
        'tempat',
        'foto_bukti',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu' => 'datetime:H:i:s',
    ];

    // Relasi ke User
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }

    // Accessor untuk URL foto
    public function getFotoBuktiUrlAttribute()
    {
        return Storage::url($this->foto_bukti);
    }

    // Scope untuk filter berdasarkan tanggal
    public function scopeTanggal($query, $tanggal)
    {
        return $query->whereDate('tanggal', $tanggal);
    }

    // Scope untuk filter berdasarkan pengguna
    public function scopePengguna($query, $penggunaId)
    {
        return $query->where('pengguna_id', $penggunaId);
    }
}