<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Owners;
// use App\Http\Controllers\API\Pets;
use App\Http\Controllers\API\Owners\Pets;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/******************** Owners Routes ************************/

Route::group([
    "prefix" => "owners",
    "middleware" => ["auth:api"], //group authentication
],
    function() {
        //show all owners
        // to add authentication to a specific route: ->middleware('auth:api') at the end of it
        Route::get("", [Owners::class, "index"]);

        //show a spesific owner
        Route::get("{owner}", [Owners::class, "show"]);

        //create a new owner
        Route::post("create", [Owners::class, "store"]);

        //delete an owner
        Route::delete("{owner}", [Owners::class, "destroy"]);

        //update an owner
        Route::put("{owner}", [Owners::class, "update"]);

        //show a list of pets of a specific owner
        Route::get("{owner}/pets", [Pets::class, "showOwnersPets"]);

        //create a new pet and add it to an existing owner
        Route::post("{owner}/pets/create", [Owners::class, "addPet"]);

        //delete a pet that belongs to an existing owner
        Route::delete("{owner}/pets/{pet}", [Owners::class, "removePet"]);
    }
);

/********************* Pets Routes *************************/

//show all pets
Route::get("pets", [Pets::class, "index"]);

//show a specific pet
Route::get("pets/{pet}", [Pets::class, "show"]);

//delete a pet
Route::delete("pets/{pet}", [Pets::class, "destroy"]);

//update a pet
Route::put("pets/{pet}", [Pets::class, "update"]);