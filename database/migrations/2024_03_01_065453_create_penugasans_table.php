<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penugasans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_matkul');
            $table->uuid('id_kelas');
            $table->uuid('id_dosen');
            $table->string('kode_tugas')->unique();
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('link_tugas');
            $table->string('mulai');
            $table->string('deadline');
            $table->enum('status', ['Dibuka', 'Ditutup']);
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_matkul')->references('id')->on('mata_kuliahs')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('dosens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasans');
    }
};
