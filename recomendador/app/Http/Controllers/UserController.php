<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;



class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $player = User::create($request->all());

        return (new UserResource($user))
                ->response()
                ->setStatusCode(201);
    }

   /* public function answer($id, Request $request)
    {
        $request->merge(['correct' => (bool) json_decode($request->get('correct'))]);
        $request->validate([
            'correct' => 'required|boolean'
        ]);

        $user = User::findOrFail($id);
        $user->answers++;
        $user->points = ($request->get('correct')
                           ? $user->points + 1
                           : $user->points - 1);
        $user->save();

        return new UserResource($user);
    }*/

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }

    public function resetAnswers($id)
    {
        $user = User::findOrFail($id);
        $user->answers = 0;
        $user->points = 0;

        return new UserResource($user);
    }
}
