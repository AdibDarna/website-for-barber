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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_transaksi',256);
            $table->string('email_transaksi',256);
            $table->string('waktu_transaksi',256);
            $table->string('notelepon_transaksi',256);
            $table->string('jasacukur_transaksi',256);
            $table->string('layanan_transaksi',256);
            $table->string('paket_transaksi',256);
            $table->string('jumlahcukur_transaksi',256);
            $table->string('perawatanrambut_transaksi',256)->nullable();
            $table->string('jumlahperawatanrambut_transaksi',256)->nullable();
            $table->string('nominalperawatanrambut_transaksi',256)->nullable();
            $table->string('minumankulkas_transaksi',256)->nullable();
            $table->string('jumlahminumankulkas_transaksi',256)->nullable();
            $table->string('nominalminumankulkas_transaksi',256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
