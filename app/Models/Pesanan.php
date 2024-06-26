<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table ='pesanans';
    protected $primaryKey ='id';
    protected $fillable = [
        'id_pelanggan','namalengkap_pesan','email_pesan','notel_pesan','layanan_pesan',
        'gayapotongan_pesan','tanggal_pesan','waktu_pesan','jasacukur_pesan','total_harga',
        'buktipembayaran_pesan','isipesan_pesan','status_pesan'
    ];
}
