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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kampus');
            $table->string('kode_fk')->unique();
            $table->string('nama_fk');
            $table->enum('status', ['Aktif', 'Tutup']);
            $table->string('logo_fk');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_kampus')->references('id')->on('universitas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakultas');
    }
};
