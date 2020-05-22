<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()['role'] === 'author';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
