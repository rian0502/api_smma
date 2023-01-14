<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $primaryKey = 'uuid';
    protected $fillable = [
       'uuid',
       'nama_model',
       'id_manufacturer',
       'id_kategori',
       'no_model',
       'foto',
    ];
    public function category(){
        return $this->belongsTo(categories::class, 'id_kategori');
    }
    public function manufacturer(){
        return $this->belongsTo(manufacturer::class, 'id_manufacturer');
    }

}
