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
            'id' => $this->id,
            'user_roles_id' => $this->user_roles_id,
            'username' => $this->username,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'role_name' => $this->role_name,
            'address' => $this->address->address,
            'province' => $this->address->province,
            'city' => $this->address->city,
            'country' => $this->address->country,
            'postal_code' => $this->address->postal_code,
        ];
    }
}
