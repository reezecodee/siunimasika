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
        Schema::create('admin_pusats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user');
            $table->string('nama');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->text('alamat')->nullable(true);
            $table->string('photo_profile')->nullable(true);
            $table->enum('status', ['Aktif', 'Cuti', 'Tidak aktif']);
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_pusats');
    }
};
