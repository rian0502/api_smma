<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assets extends Model
{
    use HasFactory;
    protected $table = 'assets';
    protected $primaryKey = 'uuid';
    protected $fillable = [
       'uuid',
       'serial',
       'id_model',
       'id_location',
       'id_supplier',
       'nama_asset',
       'purchase_date',
       'order_number',
       'notes',
    ];

    public function model(){
        return $this->belongsTo(models::class, 'id_model');
    }
    public function location(){
        return $this->belongsTo(locations::class, 'id_location');
    }
    public function supplier(){
        return $this->belongsTo(suppliers::class, 'id_supplier');
    }
    public function maintenance(){
        return $this->hasMany(maintenance::class);
    }
}
