<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriPengunjung extends Model
{
    use HasFactory;
    protected $table ='galeri_pengunjungs';
    protected $primaryKey ='id';
    protected $fillable = [
        'nama_gaya','gambar_gaya'
    ];
}
