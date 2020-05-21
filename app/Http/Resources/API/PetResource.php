<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "pet_name" => $this->pet_name,
            "dob" => $this->dob,
            "weight" => $this->weight,
            "height" => $this->height,
            "biteyness" => $this->biteyness,
            "owner" => $this->owner->fullName(),
            "treatments" => $this->treatments
        ];
    }
}
