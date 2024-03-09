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
            $table->uuid('id')->primary();
            $table->uuid('id_dekan');
            $table->string('kode_fk')->unique();
            $table->string('nama_fk')->unique();
            $table->enum('status', ['Aktif', 'Tidak aktif'])->default('Tidak aktif');
            $table->string('picture')->nullable(true);
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_dekan')->references('id')->on('dosens')->onDelete('cascade');
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
