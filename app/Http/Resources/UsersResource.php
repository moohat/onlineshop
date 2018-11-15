<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return[
            "id" => $this->id,
            "name" => ucfirst($this->name),
            "username" => $this->username,
            "email" => $this->email,
            "api_token" => $this->api_token,
            "is_admin" => $this->is_admin,

        ];
    }
}
