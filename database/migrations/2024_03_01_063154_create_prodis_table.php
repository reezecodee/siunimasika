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
            $table->id();
            $table->unsignedBigInteger('id_fk');
            $table->string('kode_prodi')->unique();
            $table->string('jenjang');
            $table->string('nama_prodi');
            $table->enum('status', ['Aktif', 'Tutup']);
            $table->string('logo_prodi');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_fk')->references('id')->on('fakultas')->onDelete('cascade');
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
