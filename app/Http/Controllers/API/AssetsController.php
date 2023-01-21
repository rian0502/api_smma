<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\assets;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Assets::all();

        return response()->json([
            'data' => $data
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
        //
        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'id_model' => $request->id_model,
            'serial' => date('ymdhis'),
            'id_location' => $request->id_location,
            'id_supplier' => $request->id_supplier,
            'nama_asset' => $request->nama_asset,
            'purchase_date' => $request->purchase_date,
            'order_number' => $request->order_number,
            'notes' => $request->notes,
        ];
        $insert = Assets::create($data);
        if ($insert) {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function show(Assets $assets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'id_model' => $request->id_model,
            'id_location' => $request->id_location,
            'id_supplier' => $request->id_supplier,
            'nama_asset' => $request->nama_asset,
            'purchase_date' => $request->purchase_date,
            'order_number' => $request->order_number,
            'notes' => $request->notes,
        ];
        $update = Assets::where('id', $id)->update($data);
        if ($update) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diupdate',

            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal diupdate',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Assets::where('uuid', $id)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal dihapus',
            ], 400);
        }
    }
}
