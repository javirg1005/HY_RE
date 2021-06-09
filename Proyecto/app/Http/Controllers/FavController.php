<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resp = Fav::all();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }

    public function getFavId($id_usu, $id_inmueble) {
        $resp = Fav::select('id')->where('Id_usu', $id_usu)->where('Id_inmueble', $id_inmueble)->get();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }

    public function getFavsByUsuId($userId)
    {
        $resp = DB::table('favs')
                    ->join('users', 'favs.Id_usu', 'users.id')
                    ->join('inmuebles', 'favs.Id_inmueble', 'inmuebles.id')
                    ->select('users.id as userId', 'inmuebles.*')
                    ->where("favs.Id_usu", $userId)->get();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }


    public function addFav(Request $request) {
        $fav = new Fav;
        $fav->Id_usu = $request->id_usu;
        $fav->Id_inmueble = $request->id_inmueble;
        $fav->save();

        return response()->json([
            "message" => "fav record created"
        ], 201);
    }

    public function isFav($id_usu, $id_inmueble) {
        $resp = Fav::where('Id_usu', $id_usu)->where('Id_inmueble', $id_inmueble)->get();
        return response()->json($resp->isEmpty(), 201);
    }

    public function delete($id) {
        $fav = Fav::FindOrFail($id);
        $fav->delete();
        return response()->json([
            "message" => "fav record deleted"
        ], 201);
    }

    //Añadir vivienda a la base de datos, tabla viviendas y a favoritos
    //De sofi 

    public function addVivienda(Request $request, $user_id){
        $enlace_vivienda = Vivienda::where('link', $request['link']) -> first();

        if($enlace_vivienda){
            $response['status'] = 0;
            $response['mensaje'] = "Vivienda ya existe";
            $response['codigo'] = 409;
            $usuario = User::find($user_id);
            $usuario -> viviendas() -> attach($enlace_vivienda -> vivienda_ID);
            $response['usuario_ID'] = $user_id;
            $response['vivienda_ID'] = $enlace_vivienda -> vivienda_ID;
        }else{
            $vivienda = Vivienda::create($request->json()->all());
            $usuario = User::find($user_id);
            $usuario -> viviendas() -> attach($vivienda -> vivienda_ID);
            $response['usuario_ID'] = $user_id;
            $response['vivienda_ID'] = $vivienda -> vivienda_ID;
        }

        return response() -> json($response);
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
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function show(Fav $fav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function edit(Fav $fav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fav $fav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fav $fav)
    {
        //
    }
}
