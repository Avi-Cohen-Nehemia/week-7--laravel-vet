<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pet;
use App\Http\Resources\API\PetResource;

class Pets extends Controller
{
    //show all pets
    public function index()
    {
        return PetResource::collection(Pet::all());
    }

    //create a new pet
    public function store(Request $request)
    {
        $data = $request->all();

        $pet = Pet::create($data);
        
        return new PetResource($pet);
    }

    //show a specific pet
    public function show(Pet $pet)
    {
        return new PetResource($pet);
    }

    //update a pet's info
    public function update(Request $request, Pet $pet)
    {
        $data = $request->all();

        $pet->fill($data)->save();

        return new PetResource($pet);
    }

    // delete a pet from the DB
    public function destroy(Pet $pet)
    {
        $pet->delete();

        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
