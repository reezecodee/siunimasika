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
        Schema::create('pengerjaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tugas');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->string('kode_pengerjaan')->unique();
            $table->string('link_tugas');
            $table->enum('status', ['Belum dikerjakan', 'Dikerjakan', 'Tidak dikerjakan'])->default('Belum dikerjakan');
            $table->string('nilai')->default('0');
            $table->string('komentar_dosen');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_tugas')->references('id')->on('penugasans')->onDelete('cascade');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengerjaans');
    }
};
