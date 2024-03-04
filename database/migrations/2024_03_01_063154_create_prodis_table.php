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
        Schema::create('prodis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kampus');
            $table->uuid('id_fk');
            $table->uuid('id_kaprodi');
            $table->string('kode_prodi')->unique();
            $table->string('jenjang');
            $table->string('nama_prodi');
            $table->enum('status', ['Aktif', 'Tutup']);
            $table->string('logo_prodi');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_kampus')->references('id')->on('universitas')->onDelete('cascade');
            $table->foreign('id_fk')->references('id')->on('fakultas')->onDelete('cascade');
            $table->foreign('id_kaprodi')->references('id')->on('dosens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
