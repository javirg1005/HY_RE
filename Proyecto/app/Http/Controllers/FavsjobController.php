<?php

namespace App\Http\Controllers;

use App\Models\Favsjob;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FavsjobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resp = Favsjob::all();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }
 
    public function getFavsByUsuId($userId)
    {
        $resp = DB::table('favsjob')
                    ->join('users', 'favsjob.Id_usu', 'users.id')
                    ->join('empleos', 'favsjob.Id_job', 'empleos.id')
                    ->select('users.id', 'empleos.*')
                    ->where("favsjob.Id_usu", $userId)->get();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }

    public function addFav(Request $request) {
        $fav = Favsjob::create($request->all());
        return response()->json($fav, 201);
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
     * @param  \App\Models\Favsjob  $favsjob
     * @return \Illuminate\Http\Response
     */
    public function show(Favsjob $favsjob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favsjob  $favsjob
     * @return \Illuminate\Http\Response
     */
    public function edit(Favsjob $favsjob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favsjob  $favsjob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favsjob $favsjob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favsjob  $favsjob
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favsjob $favsjob)
    {
        //
    }
}
