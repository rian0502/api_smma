<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'id_asset' => $request->id_asset,
            'id_teknisi' => $request->id_teknisi,
            'note' => $request->note,
        ];
        $insert = Maintenance::create($data);
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
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'id_asset' => $request->id_asset,
            'id_teknisi' => $request->id_teknisi,
            'note' => $request->note,
        ];
        $update = Maintenance::where('uuid', $id)->update($data);
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
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
