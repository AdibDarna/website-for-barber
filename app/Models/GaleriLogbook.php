<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriLogbook extends Model
{
    use HasFactory;
    protected $table ='galeri_logbooks';
    protected $primaryKey ='id';
    protected $fillable = [
        'nama_logbook','gambar_logbook'
    ];
}
