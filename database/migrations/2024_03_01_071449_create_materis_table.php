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
        Schema::create('materis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_matkul');
            $table->uuid('id_prodi');
            $table->uuid('id_dosen');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('link_materi');
            $table->string('pertemuan');
            $table->string('semester');
            $table->enum('tipe_materi', ['Pertemuan', 'Tambahan'])->default('Pertemuan');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_matkul')->references('id')->on('mata_kuliahs')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('prodis')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('dosens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};
