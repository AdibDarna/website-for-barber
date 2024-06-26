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
        Schema::create('laporantransaksis', function (Blueprint $table) {
            $table->id();
            $table->string('namaadmin_laporan',256);
            $table->string('jenislaporan_laporan',256);
            $table->string('mulai_laporan',256);
            $table->string('sampai_laporan',256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporantransaksis');
    }
};
