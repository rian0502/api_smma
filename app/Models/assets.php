<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assets extends Model
{
    use HasFactory;
    protected $table = 'assets';
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
}
