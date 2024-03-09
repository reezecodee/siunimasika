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
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_prodi');
            $table->uuid('id_kelas');
            $table->uuid('id_dosen');
            $table->string('kode_mk')->unique();
            $table->string('nama_mk')->unique();
            $table->string('semester');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_prodi')->references('id')->on('prodis')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('no action');
            $table->foreign('id_dosen')->references('id')->on('dosens')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
