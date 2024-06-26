<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporantransaksi extends Model
{
    use HasFactory;
    protected $table ='laporantransaksis';
    protected $primaryKey ='id';
    protected $fillable = [
        'namaadmin_laporan','jenislaporan_laporan','mulai_laporan','sampai_laporan'
    ];
}

