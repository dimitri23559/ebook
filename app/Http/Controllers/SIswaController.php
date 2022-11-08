<?php

namespace App\Http\Controllers;

use App\Models\SIswa;
use App\Http\Requests\StoreSIswaRequest;
use App\Http\Requests\UpdateSIswaRequest;

class SIswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = SIswa::all();

        return response()->json([
            'message' => 'Load Data Success!',
            'data' => $table
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSIswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSIswaRequest $request)
    {
        $table = Siswa::create([
            "name"=>$request->name,
            "genders"=>$request->genders,
            "age"=>$request->age
        ]);

        // return $table;
        return response()->josn([
            "message"=>"load data success",
            "data"=> $table
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SIswa  $sIswa
     * @return \Illuminate\Http\Response
     */
    public function show(SIswa $sIswa)
    {
        $table= Siswa::find($sIswa);
        if($table){
            return $table;
        }else{
            return ["message"=>"data not found"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SIswa  $sIswa
     * @return \Illuminate\Http\Response
     */
    public function edit(SIswa $sIswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSIswaRequest  $request
     * @param  \App\Models\SIswa  $sIswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSIswaRequest $request, SIswa $sIswa)
    {
        $table = Siswa::find($sIswa);
        if ($table){
            $table->name =  $request->name ? $request->name : $table->name;
            $table->genders = $request->genders ? $request->genders : $table->genders;
            $table->age = $request->age ? $request->age : $table->age;
            $table->save();

            return $table;
        }else{
            return["message" => "data not found"];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SIswa  $sIswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(SIswa $sIswa)
    {
        $table = $sIswa::find($sIswa);
        if($table){
            $table->delete();
            return["message"=>"Deleted"];
        }else{
            return["message"=>"fail"];
        }
    }
}
