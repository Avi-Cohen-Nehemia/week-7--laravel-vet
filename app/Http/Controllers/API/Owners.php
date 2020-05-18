<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Owner;

class Owners extends Controller
{
    //show all owners
    public function index()
    {
        return Owner::all();
    }

    //create a new owner
    public function store(Request $request)
    {
        // get all the request data
        // returns an array of all the data the user sent
        $data = $request->all();

        // create owner with data and store in DB
        // and return it as JSON
        // automatically gets 201 status as it's a POST request
        return Owner::create($data);
    }

    //show a specific owner
    public function show(Owner $owner)
    {
        return $owner;
    }

    // request is passed in because we ask for it with type hinting
    // and the URL parameter is always passed in
    public function update(Request $request, Owner $owner)
    {
        // get the request data
        $data = $request->all();

        // update the owner using the fill method
        // then save it to the database
        $owner->fill($data)->save();

        // return the updated version
        return $owner;
    }

    // delete the owner from the DB
    public function destroy(Owner $owner)
    {
        $owner->delete();

        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
