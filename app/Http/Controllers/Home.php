<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $greeting = "Good ";

        if (date("H") < 12) {
            $greeting .= "Morning!";

        } else if (date("H") < 17) {
            $greeting .= "Afternoon!";

        } else {
            $greeting .= "Evening!";
        }

        return view('welcome', ["greeting" => $greeting]);
    }
}
