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
            $table->uuid('id_fk');
            $table->uuid('id_kaprodi');
            $table->string('kode_prodi')->unique();
            $table->string('jenjang');
            $table->string('nama_prodi')->unique();
            $table->enum('status', ['Aktif', 'Tidak aktif'])->default('Tidak aktif');
            $table->string('picture')->nullable(true);
            $table->timestamps();

            // Foreign Key
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
