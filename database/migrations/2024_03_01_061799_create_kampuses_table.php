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
        Schema::create('kampuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_kampus')->unique();
            $table->string('nama_kampus')->unique();
            $table->enum('kategori', ['Utama', 'PSDKU'])->default('PSDKU');
            $table->enum('status', ['Aktif', 'Tidak aktif'])->default('Tidak aktif');
            $table->string('telepon')->unique();
            $table->string('email')->unique();
            $table->string('picture')->nullable(true);
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kampuses');
    }
};
