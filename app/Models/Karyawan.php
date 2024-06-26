<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table ='karyawans';
    protected $primaryKey ='id';
    protected $fillable = [
        'nama_karyawan','email_karyawan','nik_karyawan','ktp_karyawan',
        'notelepon_karyawan','nodarurat_karyawan','jeniskelamin_karyawan',
        'alamat_karyawan','foto','status_karyawan'
    ];
}
