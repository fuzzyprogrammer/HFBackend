<?php

namespace App\Http\Controllers;

use App\Models\Jamath;
use Illuminate\Http\Request;

class JamathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jamaths = Jamath::all();
        $data = $jamaths->map(function($jamath){
            return[
                $jamath,
                $jamath->address
            ];
        });
        return response()->json($jamaths);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();

        $jamath = Jamath::create($data);

        return response()->json([
            'msg'=>"Successfully created a new Jamath entry",
            'jamath'=>$jamath
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jamath  $jamath
     * @return \Illuminate\Http\Response
     */
    public function show(Jamath $jamath)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jamath  $jamath
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jamath $jamath)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jamath  $jamath
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jamath $jamath)
    {
        //
    }
}
