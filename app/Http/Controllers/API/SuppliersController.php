<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Suppliers::all ();
        return response()->json([
            'data' => $suppliers
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
        $suppliers = Suppliers::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama_supplier' => $request->nama_supplier,
            'no_telp' => $request->no_telp
        ]);
        return response()->json([
            'data' => $suppliers
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        $data = Suppliers::all();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nama_supplier' => $request->nama_supplier,
            'no_telp' => $request->no_telp
        ];
        Suppliers::where(['uuid'=>$id])->update($data);
        echo 'data update';
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Suppliers::where(['uuid'=>$id])->delete();
    }
}
