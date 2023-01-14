<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturer';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'uuid',
        'nama_manufactur'
    ];
    public function models(){
        return $this->hasMany(models::class);
    }
}
