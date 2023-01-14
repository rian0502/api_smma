<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'uuid',
        'nama_supplier',
        'no_telp'
    ];
    public function assets(){
        return $this->hasMany(assets::class);
    }
}
