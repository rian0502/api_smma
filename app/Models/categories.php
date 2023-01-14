<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'uuid',
        'nama_kategori'
    ];   
    public function models(){
        return $this->hasMany(models::class);
    }
}
