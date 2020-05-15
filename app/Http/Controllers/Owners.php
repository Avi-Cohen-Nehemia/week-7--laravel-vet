<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Owner;
use App\Http\Requests\PetRequest;
use App\Pet;

class Owners extends Controller
{
    public function index()
    {
        //orderBy() reorginzes the data by the column column passed to it
        //paginate() limits how many objects will show per page
        $owners = Owner::orderBy('first_name')->paginate(3);

        //we can pass an empty array instead, to test that the else statement is actually warking
        //$owners = [];

        return view('phonebook', ["owners" => $owners]);
    }

    public function show(Owner $owner)
    {
        return view("owner", ["owner" => $owner]);
    }

    public function create()
    {
        return view("form");
    }

    public function createOwner(OwnerRequest $request)
    {
        // get all of the submitted data
        $data = $request->all();

        // create a new article, passing in the submitted data
        $owner = Owner::create($data);

        // redirect the browser to the new owner
        return redirect("/phonebook/success");
    }

    public function add()
    {
        return view("addPet");
    }

    public function addPet(PetRequest $request)
    {
        $data = $request->all();

        $pet = Pet::create($data);

        return redirect("/phonebook/success");
    }

    //Methods to edit an Owner:
    public function edit(Owner $owner)
    {
        return view("form", ["owner" => $owner]);
    }

    public function editOwner(Owner $owner, OwnerRequest $request)
    {
        //storing the information populated within the form inputs into the $data variable.
        $data = $request->all();
        
        //fill will overwrite the owner variable with the $data variable and then we save it
        $owner->fill($data)->save();

        return redirect("/phonebook/success");
    }

    public function success()
    {
        return view("success");
    }
}