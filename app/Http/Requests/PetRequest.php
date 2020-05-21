<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "pet_name" => ["required", "string", "max:30"],
            "animal_type" => ["required", "string", "max:20"],
            "dob" => ["required", "string", "max:12"],
            "weight" => ["required", "string", "max:10"],
            "height" => ["required", "string", "max:6"],
            "owner_id" => ["required", "integer"],
            "biteyness" => ["required", "integer", "max:1"],
            // check tags is an array
            "treatments" => ["required", "array"],
            // check members of treatments are strings
            "treatments.*" => ["string", "max:50"],
        ];
    }
}
