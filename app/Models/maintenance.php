<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenance extends Model
{
    use HasFactory;
    protected $table = 'maintenance';
    protected $fillable = [
        'uuid',
        'id_asset',
        'id_teknisi',
        'note',
    ];


    public function asset()
    {
        return $this->belongsTo(assets::class, 'id_asset');
    }

    public function teknisi()
    {
        return $this->belongsTo(teknisi::class, 'id_teknisi');
    }
}
