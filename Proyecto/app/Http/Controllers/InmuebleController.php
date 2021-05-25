<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resp = Inmueble::all();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }

    public function getInmueble($id) {
        $resp = Inmueble::where("id", $id)->get();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }

    public function getInmuebleProvincia($hab) {
        $resp = Inmueble::where("habitaciones", $hab)->get();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }
    /*
    #Este hay que meterlo en un form que es el input del boton fav
    public function addInmuebleFav($id, $idUsu, Request $request) {
        $this->validate($request, [
        'ID_User' => 'required',
        'id' => 'required',
        'ID_House' => 'required'
        ]);
        $fav = new Fav([
            'ID_User' => $request->get('ID_User'),
            'id' => $request->get('id'),
            'ID_House' => $request->get('ID_House')
        ]);
        $fav->save();
        return redirect()->route('/inmuebles/addFav')->with('success','Data Added');
    }
    */
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
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Inmueble $inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Inmueble $inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inmueble $inmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inmueble $inmueble)
    {
        //
    }
}
