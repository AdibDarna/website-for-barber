<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_transaksi', 
        'email_transaksi',
        'waktu_transaksi', 
        'notelepon_transaksi',
        'jasacukur_transaksi', 
        'layanan_transaksi',
        'paket_transaksi',
        'jumlahcukur_transaksi', 
        'perawatanrambut_transaksi',
        'jumlahperawatanrambut_transaksi',
        'nominalperawatanrambut_transaksi',
        'minumankulkas_transaksi',
        'jumlahminumankulkas_transaksi',
        'nominalminumankulkas_transaksi',
        'created_at'
    ];
}

