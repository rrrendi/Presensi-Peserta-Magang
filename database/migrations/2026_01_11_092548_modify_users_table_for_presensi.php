<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ubah nama kolom 'name' menjadi 'nama'
            $table->renameColumn('name', 'nama');
            
            // Tambah kolom role
            $table->enum('role', ['peserta_magang', 'admin'])->default('peserta_magang')->after('password');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('nama', 'name');
            $table->dropColumn('role');
        });
    }
};