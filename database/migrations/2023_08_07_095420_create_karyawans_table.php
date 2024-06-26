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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan',256);
            $table->string('email_karyawan',256);
            $table->string('nik_karyawan',256);
            $table->string('ktp_karyawan',256);
            $table->string('foto',256);
            $table->string('notelepon_karyawan',256);
            $table->string('nodarurat_karyawan',256);
            $table->string('jeniskelamin_karyawan',256);
            $table->string('alamat_karyawan',256);
            $table->string('status_karyawan',256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
