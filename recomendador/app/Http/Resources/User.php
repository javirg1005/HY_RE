<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'username'    => $this->username,
            'email'     =>  $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'token' => $this->token,
            'updated_at' => $this->updated_at,
        ];
    }
}
