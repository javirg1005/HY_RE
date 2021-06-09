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

    public function max_precio()
    {
        $resp = Inmueble::max('Precio');
        return $resp;
    }

    public function max_hab()
    {
        $resp = Inmueble::max('Habitaciones');
        return $resp;
    }

    public function max_metros()
    {
        $resp = Inmueble::max('Metros');
        return $resp;
    }

    public function getInmueble($id) {
        $resp = Inmueble::where("id", $id)->get();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }

    public function filtroMain(Request $filtro) {
        print_r($filtro);
        $precio = $filtro['precio'];
        $hab = $filtro['habs'];
        $prov = strtolower($filtro['prov']);
        if ($prov == "Todas las provincias") {
            $resp = Inmueble::where("Habitaciones", "<=", $hab)->where("precio", "<=" , $precio)->get();
        } else {
            $resp = Inmueble::where("Habitaciones", "<=", $hab)->where("precio", "<=" , $precio)->where("provincia", $prov)->get();
        }
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
