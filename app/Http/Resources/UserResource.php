<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'address' => $this->address,
            'neighborhood' => $this->neighborhood,
            'number' => $this->number,
            // 'type' => $this->type,
            'city_id' => $this->city_id,
            // 'city_name' => $this->city_name,
            // 'uf' => $this->uf,
        ];
    }
}