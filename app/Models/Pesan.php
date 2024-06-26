<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = 'pesans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email', 'kritik', 'saran'
    ];
}
