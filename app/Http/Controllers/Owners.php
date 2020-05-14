<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Owner;

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
}
