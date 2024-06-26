<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table ='pelanggans';
    protected $primaryKey ='id';
    protected $fillable = [
        'nama_pelanggan','email_pelanggan','notelepon_pelanggan','jeniskelamin_pelanggan',
        'alamat_pelanggan','status_pelanggan'
    ];
}
