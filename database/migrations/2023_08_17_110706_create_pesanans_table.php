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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan',256);
            $table->string('namalengkap_pesan',256);
            $table->string('email_pesan',256);;
            $table->string('notel_pesan',256);
            $table->string('layanan_pesan',256)->nullable();
            $table->string('gayapotongan_pesan',256);
            $table->string('tanggal_pesan',256);
            $table->string('waktu_pesan',256);
            $table->string('jasacukur_pesan',256);
            $table->string('total_harga',256);
            $table->string('buktipembayaran_pesan',256)->nullable();
            $table->string('isipesan_pesan',256);
            $table->string('status_pesan',256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
