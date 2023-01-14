<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $fillable = [
       'uuid',
       'nama_model',
       'id_manufacturer',
       'id_category',
       'no_model',
       'foto',
    ];
}
