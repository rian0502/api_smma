<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class locations extends Model
{
    use HasFactory;

    protected $table = 'locations';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'uuid',
        'nama_gedung',
        'lantai'
    ];

    public function assets(){
        return $this->hasMany(assets::class);
    }
}
