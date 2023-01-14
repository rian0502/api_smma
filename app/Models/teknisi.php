<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teknisi extends Model
{
    use HasFactory;
    protected $table = 'teknisi';
    protected $fillable = [
        'uuid',
        'nik',
        'nama_teknisi'
    ];
}
