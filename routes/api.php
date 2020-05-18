<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Owners;
use App\Http\Controllers\API\Pets;

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

//show all owners
Route::get("/owners", [Owners::class, "index"]);

//show a spesific owner
Route::get("/owners/{owner}", [Owners::class, "show"]);

//create a new owner
Route::post("/owners/create", [Owners::class, "store"]);

//delete an owner
Route::delete("/owners/{owner}", [Owners::class, "destroy"]);

//update an owner
Route::put("/owners/{owner}", [Owners::class, "update"]);



/********************* Pets Routes *************************/

//show all pets
Route::get("/pets", [Pets::class, "index"]);

//show a spesific pet
Route::get("/pets/{pet}", [Pets::class, "show"]);

//create a new pet
Route::post("/pets/create", [Pets::class, "store"]);

//delete a pet
Route::delete("/pets/{pet}", [Pets::class, "destroy"]);

//update a pet
Route::put("/pets/{pet}", [Pets::class, "update"]);