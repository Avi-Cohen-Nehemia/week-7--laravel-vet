<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "Home@index");

Route::get('about', function () {
    return view('about');
});

Route::get('phonebook', "Owners@index");

Route::get('phonebook/success', "Owners@success");

//Routs for creating an Owner
Route::get('phonebook/create', "Owners@create");
Route::post('phonebook/create', "Owners@createOwner");

//Routs for editing an Owner
Route::get('phonebook/edit/{owner}', "Owners@edit");
Route::post('phonebook/edit/{owner}', "Owners@editOwner");

Route::get("phonebook/{owner}", "Owners@show");

Route::get("phonebook/{owner}/addPet", "Owners@add");
Route::post("phonebook/{owner}/addPet", "Owners@addPet");