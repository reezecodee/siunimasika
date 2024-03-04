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
        Schema::create('universitas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_pt')->unique();
            $table->string('nama_pt');
            $table->enum('kategori', ['Pusat', 'PSDKU']);
            $table->enum('status', ['Aktif', 'Tidak aktif']);
            $table->string('tanggal_berdiri');
            $table->string('telepon')->unique();
            $table->string('email')->unique();
            $table->string('picture')->default('unimasika.png');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universitas');
    }
};
