<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\manufacturer;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($search = '')
    {
        if ($search != '') {
            $manufacturer = Manufacturer::where('nama_manufactur', 'LIKE', '%' . $search . '%')->get();
        } else {
            $manufacturer = Manufacturer::all();
        }

        return response()->json([
            'data' => $manufacturer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manufacturer = Manufacturer::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama_manufactur' => $request->nama_manufactur
        ]);
        if ($manufacturer) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $manufacturer
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal ditambahkan',
                'data' => ''
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        $data = Manufacturer::all();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ([
            'nama_manufactur' => $request->nama_manufactur
        ]);
        echo 'data update';
        $update = Manufacturer::where(['uuid'=>$id])->update($data);
        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah',
                'data' => $update
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal diupdate',
                'data' => ''
            ], 400);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Manufacturer::where(['uuid'=>$id])->delete();
    }
}
