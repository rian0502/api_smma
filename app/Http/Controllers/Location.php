<?php

namespace App\Http\Controllers;


use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\LocationModel;
use Illuminate\Routing\Controller;

class Location extends Controller
{
    //

    public function store(Request $request){
        $data = LocationModel::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama_gedung' => $request->nama_gedung,
            'lantai' => $request->lantai,
        ]);
        
        return $data;
    }
}
