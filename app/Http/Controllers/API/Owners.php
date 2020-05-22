<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Owner;
use App\Pet;
use App\Http\Requests\API\OwnerRequest;
use App\Http\Resources\API\OwnerResource;
use App\Http\Resources\API\PetResource;
use App\Http\Requests\OwnerStoreRequest;

class Owners extends Controller
{
    //show all owners
    public function index()
    {
        return OwnerResource::collection(Owner::all());
    }

    //create a new owner and return filtered result with OwnerResource
    public function store(OwnerStoreRequest $request)
    {
        // get all the request data
        // returns an array of all the data the user sent
        $data = $request->all();

        // store owner in variable
        $owner = Owner::create($data);

        // return the resource with OwnerResource filter
        return new OwnerResource($owner);
    }

    /*
    //create a new owner
    public function store(OwnerRequest $request)
    {
        // get all the request data
        // returns an array of all the data the user sent
        $data = $request->all();

        // create owner with data and store in DB
        // and return it as JSON
        // automatically gets 201 status as it's a POST request
        return Owner::create($data);
    }
    */

    //show a specific owner
    public function show(Owner $owner)
    {
        //with an OwnerResource filter
        return new OwnerResource($owner);

        /*without OwnerResource filter filter (showing all of its data)
        return $owner; */
    }

    //show a list of pets of a specific owner with resouece filter
    public function showPets(Owner $owner)
    {
        return PetResource::collection($owner->pets);
    }

    // request is passed in because we ask for it with type hinting
    // and the URL parameter is always passed in
    public function update(OwnerRequest $request, Owner $owner)
    {   
        // get the request data
        $data = $request->all();

        // update the owner using the fill method
        // then save it to the database
        $owner->fill($data)->save();

        // return the updated version (filtered by OwnerResource)
        return new OwnerResource($owner);
    }

    // delete the owner from the DB
    public function destroy(Owner $owner)
    {
        $owner->delete();

        // use a 204 code as there is no content in the response
        return response(null, 204);
    }

    //create a new pet for existing owner
    public function addPet(Request $request, Owner $owner)
    {
        $data = $request->only(["pet_name", "animal_type", "dob", "weight", "height", "biteyness"]);
        
        $pet = $owner->pets()->create($data);

        $pet->setTreatments($request->get("treatments"));

        return new OwnerResource($owner);
    }
}
