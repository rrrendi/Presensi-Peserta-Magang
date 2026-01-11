<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('izin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('jenis_izin', ['sakit', 'kuliah', 'lainnya']);
            $table->text('keterangan');
            $table->time('waktu');
            $table->string('tempat');
            $table->string('foto_bukti'); // path ke storage
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index(['pengguna_id', 'tanggal']);
            
            // Unique constraint: 1 izin per pengguna per hari
            $table->unique(['pengguna_id', 'tanggal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('izin');
    }
};