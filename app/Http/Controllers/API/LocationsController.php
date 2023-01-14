<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Locations;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Locations::all ();
        return response()->json([
            'data' => $locations
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
         
        $locations = Locations::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama_gedung' => $request->nama_gedung,
            'lantai' => $request->lantai
        ]);
        return response()->json([
            'data' => $locations
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        $data = Locations::all();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nama_gedung' => $request->nama_gedung,
            'lantai' => $request->lantai
        ];
        Locations::where(['uuid'=>$id])->update($data);
        echo 'data update';
        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Locations::where(['uuid'=>$id])->delete();
    }
}
