<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table ='pakets';
    protected $primaryKey ='id';
    protected $fillable = [
        'nama_paket','harga_paket','keterangan_paket'
    ];
}
