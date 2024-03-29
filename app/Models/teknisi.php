<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teknisi extends Model
{
    use HasFactory;
    protected $table = 'teknisi';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'uuid',
        'nik',
        'nama_teknisi'
    ];

    public function maintenance()
    {
        return $this->hasMany(maintenance::class);
    }
}
