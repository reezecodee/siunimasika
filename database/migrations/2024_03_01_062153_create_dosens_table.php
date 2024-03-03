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
        Schema::create('dosens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user');
            $table->uuid('id_kampus');
            $table->string('kode_dosen')->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->string('photo_profile');
            $table->enum('status', ['Aktif', 'Cuti', 'Tidak aktif']);
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_kampus')->references('id')->on('universitas')->onDelete('no action');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
