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
        Schema::create('absensis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user');
            $table->uuid('id_kelas');
            $table->uuid('id_matkul');
            $table->enum('kehadiran', ['Hadir', 'Izin', 'Sakit', 'Tidak hadir'])->default('Tidak hadir');
            $table->string('komentar_mhs')->nullable();
            $table->string('bukti')->nullable();
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('no action');
            $table->foreign('id_matkul')->references('id')->on('mata_kuliahs')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
