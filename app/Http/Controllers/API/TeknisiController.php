<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $teknisi = Teknisi::all ();
        return response()->json([
            'data' => $teknisi
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
        $teknisi = Teknisi::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nik' => $request->nik,
            'nama_teknisi' => $request->nama_teknisi
        ]);
        return response()->json([
            'data' => $teknisi
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        $data = Teknisi::all();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nik' => $request->nik,
            'nama_teknisi' => $request->nama_teknisi
        ];
        Teknisi::where(['uuid'=>$id])->update($data);
        echo 'data update';
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teknisi::where(['uuid'=>$id])->delete();
    }
}
