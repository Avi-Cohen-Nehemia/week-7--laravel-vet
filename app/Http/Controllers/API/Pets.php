<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pet;

class Pets extends Controller
{
    //show all pets
    public function index()
    {
        return Pet::all();
    }

    //create a new pet
    public function store(Request $request)
    {
        // get all the request data
        // returns an array of all the data the user sent
        $data = $request->all();

        // create pet with data and store in DB
        // and return it as JSON
        // automatically gets 201 status as it's a POST request
        return Pet::create($data);
    }

    //show a specific pet
    public function show(Pet $pet)
    {
        return $pet;
    }

    // request is passed in because we ask for it with type hinting
    // and the URL parameter is always passed in
    public function update(Request $request, Pet $pet)
    {
        // get the request data
        $data = $request->all();

        // update the owner using the fill method
        // then save it to the database
        $pet->fill($data)->save();

        // return the updated version
        return $pet;
    }

    // delete a pet from the DB
    public function destroy(Pet $pet)
    {
        $pet->delete();

        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
