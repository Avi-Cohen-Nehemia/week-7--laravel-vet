<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            "id" => $this->id,
            "full_name" => $this->fullName(),
            "full_address" => $this->fullAddress(),
            "pets" => $this->pets->pluck("pet_name")
        ];
        //$this regards to the Owner model
    }
}
