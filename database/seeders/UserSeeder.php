<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'nama' => 'Admin Rastek',
            'email' => 'admin@rastek.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Peserta Magang
        User::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@intern.com',
            'password' => Hash::make('password'),
            'role' => 'peserta_magang',
        ]);

        User::create([
            'nama' => 'Siti Nurhaliza',
            'email' => 'siti@intern.com',
            'password' => Hash::make('password'),
            'role' => 'peserta_magang',
        ]);

        User::create([
            'nama' => 'Ahmad Fauzi',
            'email' => 'ahmad@intern.com',
            'password' => Hash::make('password'),
            'role' => 'peserta_magang',
        ]);
    }
}