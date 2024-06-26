<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriCapster extends Model
{
    use HasFactory;
    protected $table ='galeri_capsters';
    protected $primaryKey ='id';
    protected $fillable = [
        'nama_capster','nama_gayacukur','gambar_gayacukur','keterangan_gayacukur'
    ];
}
