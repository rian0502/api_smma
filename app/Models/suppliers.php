<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = [
        'uuid',
        'nama_supplier',
        'no_telp'
    ];
}
