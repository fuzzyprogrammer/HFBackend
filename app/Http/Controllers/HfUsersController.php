<?php

namespace App\Http\Controllers;

use App\Models\HfUser;
use Illuminate\Http\Request;

class HfUsersController extends Controller
{
    public function __construct(HfUser $hfUser)
    {
        $this->middleware('auth:api', /*['except' => ['login']]*/);
        $this->HfUser = $hfUser;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $userId = auth()->user()->id;
        if ($userId == 1) {
            $users = HfUser::all();
            $data = $this->HfUser->getUsers($users);

            return response()->json($data, 200);
        }
        $users = HfUser::where('parent_id', $userId)->get();
        $data = $this->HfUser->getUsers($users);


        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->email);
        $data['remember_token'] = null;
        $data['parent_id'] = auth()->user()->id;
        // return response($data);
        $hfUser = HfUser::create($data);

        return response($hfUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HfUser  $hfUser
     * @return \Illuminate\Http\Response
     */
    public function show(HfUser $hfUser)
    {
        $data = [
            $hfUser,
            $hfUser->jamath,
            $hfUser->role,
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HfUser  $hfUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HfUser $hfUser)
    {
        $hfUser->update($request->all());

        return response()->json($hfUser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HfUser  $hfUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(HfUser $hfUser)
    {
        //
    }
}
