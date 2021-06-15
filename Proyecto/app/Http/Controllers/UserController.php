<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

//Code 201 for success in addUser()

class UserController extends Controller
{
     /**
     * Distribute the Token.
     *
     * @return \Illuminate\Http\Response
     */

    public function authenticate(Request $request) {
        $credentials = $request->only('username', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser() { //papaya 
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'), 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resp = User::all();
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
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resp = User::where("id", $id)->get();
        return response()->json($resp,JsonResponse::HTTP_OK);
    }

    public function getId($username)
    {
        $resp = User::where("username", $username)->get();
        return $resp['0']['id'];
    }
    public function getName($username)
    {
        $resp = User::where("username", $username)->get();
        return $resp['0']['name'];
    }
    public function getUsername($username)
    {
        $resp = User::where("username", $username)->get();
        return $resp['0']['username'];
    }
    public function getEmail($username)
    {
        $resp = User::where("username", $username)->get();
        return $resp['0']['email'];
    }

    public function getUserIdFromUsername($username)
    {
        $resp = User::where("username", $username)->first()->id;
        return $resp;
    }

    public function getNameFromUsername($username)
    {
        $resp = User::where("username", $username)->first()->name;
        return $resp;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addUser(Resquest $request) {
        $user = User::create($request->all());
        return response($employee, 201); //Code success 201 for addUser()
    }

    /*public function updateUser(Resquest $request, $id) {
        $user = User::create($request->find($id));
        if(is_null($user)){
            return response()->json(['message' => 'User not found'], 404)
        }
        return response($employee, 201); //Code success 201 for addUser()
    }*/
}
