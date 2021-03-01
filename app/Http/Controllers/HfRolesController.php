<?php

namespace App\Http\Controllers;

use App\Models\HfRole;
use Illuminate\Http\Request;

class HfRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hfRoles = HfRole::all();
        return response()->json($hfRoles);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HfRole  $hfRole
     * @return \Illuminate\Http\Response
     */
    public function show(HfRole $hfRole)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HfRole  $hfRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HfRole $hfRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HfRole  $hfRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(HfRole $hfRole)
    {
        //
    }
}
