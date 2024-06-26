<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_promo', 'masaberlaku_promo', 'keterangan_promo', 'status_promo', 'kode_promo','diskon'
    ];
}
