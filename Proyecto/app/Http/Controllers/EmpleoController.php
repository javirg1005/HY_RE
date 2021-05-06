<?php

namespace App\Http\Controllers;

use App\Models\Empleo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmpleoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resp = Empleo::all();
        return response()->json($resp,JsonResponse::HTTP_OK);
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
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
        $resp = Empleo::where("ID", $id)->get();
        return response()->json($resp,JsonResponse::HTTP_OK);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleo $empleo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleo $empleo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleo $empleo)
    {
        //
    }
}
