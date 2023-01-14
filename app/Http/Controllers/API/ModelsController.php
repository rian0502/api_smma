<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Models;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Models::all();
        return response()->json($data);
    }

    public function detail($id){
        $data = Models::where('uuid', $id)->first();
        return response()->json([
            'model' => [
                'uuid' => $data->uuid,
                'nama_model' => $data->nama_model,
                'no_model' => $data->no_model,
                'foto' => $data->foto,
                'id_manufacturer' => $data->id_manufacturer,
                'id_kategori' => $data->id_kategori,
                'nama_manufacturer' => $data->manufacturer->nama_manufactur,
                'nama_kategori' => $data->category->nama_kategori,
            ],
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
        $models = Models::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama_model' => $request->nama_model,
            'id_manufacturer' => $request->id_manufacturer,
            'id_kategori' => $request->id_kategori,
            'no_model' => $request->no_model,
        ]);
        if ($models) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal ditambahkan',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function show(Models $models)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'nama_model' => $request->nama_model,
            'id_manufacturer' => $request->id_manufacturer,
            'id_kategori' => $request->id_kategori,
            'no_model' => $request->no_model,
        ];
        $models = Models::where('uuid', $id)->update($data);
        if ($models) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal diubah',
            ], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function destroy(Models $models)
    {
        //
    }
}
