<?php

namespace App\Http\Controllers;


use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\LocationModel;
use Illuminate\Routing\Controller;

class Location extends Controller
{
    //
    public function index(){
        $data = LocationModel::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diambil',
            'data' => $data,
        ], 200);
    }
    public function store(Request $request){
        $data = LocationModel::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama_gedung' => $request->nama_gedung,
            'lantai' => $request->lantai,
        ]);
        if ($data) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal disimpan',
            ], 400);
        }
    }
}
