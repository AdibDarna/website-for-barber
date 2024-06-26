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
        Schema::create('galeri_capsters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_capster',256);
            $table->string('nama_gayacukur',256);
            $table->string('gambar_gayacukur',256);
            $table->string('keterangan_gayacukur',256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_capsters');
    }
};
