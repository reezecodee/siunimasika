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
        Schema::create('kelas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kampus');
            $table->uuid('id_fk');
            $table->uuid('id_prodi');
            $table->uuid('id_dosen_pa');
            $table->string('kode_kelas')->unique();
            $table->string('nama_kelas')->unique();
            $table->string('daya_tampung');
            $table->enum('status', ['Aktif', 'Tidak aktif'])->default('Tidak aktif');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_kampus')->references('id')->on('kampuses')->onDelete('cascade');
            $table->foreign('id_fk')->references('id')->on('fakultas')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('prodis')->onDelete('cascade');
            $table->foreign('id_dosen_pa')->references('id')->on('dosens')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
