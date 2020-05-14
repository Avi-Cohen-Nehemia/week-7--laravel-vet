<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
{
    //always return true
    //unless you add user logins
    
    public function authorize()
    {
        return true;
    }

    //return an array of validation rules for each submitted value
     
    public function rules()
    {
        return [
            "first_name" => ["required", "string", "max:30"],
            "last_name" => ["required", "string", "max:30"],
            "address_1" => ["required", "string", "max:50"],
            "address_2" => ["required", "string", "max:50"],
            "town" => ["required", "string", "max:30"],
            "postcode" => ["required", "string", "max:10"],
            "telephone" => ["required", "string", "max:11"],
        ];
    }
}
