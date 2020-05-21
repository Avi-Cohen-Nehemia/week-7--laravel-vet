<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Treatment;

class Pet extends Model
{
    protected $fillable = ["pet_name", "animal_type", "dob", "weight", "height", "owner_id", "biteyness"];

    public function dangerous() : bool
    {
        return $this->biteyness >= 3;
    }

    public function getWeight() : string
    {
        return $this->weight . "kg";
    }

    public function getHeight() : string
    {
        return $this->height . "m";
    }

    public function owner()
    {
        // a pet belongs to an owner
        return $this->belongsTo(Owner::class);
    }

    // using the belongsToMany() method
    // as it's a many-to-many relationship
    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

    // just accept an array of strings
    // we don't want to pass request in as there's no
    // reason models should know about about the request
    public function setTreatments(array $strings) : Pet
    {
        // get back a collection of Treatment objects
        $treatments = Treatment::fromStrings($strings);

        // sync the treatments: needs an array of Treatment ids
        // we're on a pet instance, so use $this
        // pass in collection of IDs
        $this->treatments()->sync($treatments->pluck("id"));

        // return $this in case we want to chain
        return $this;
    }
}

/*
$pet = new Pet();
$pet->pet_name = "Milla";
$pet->animal_type = "sanke";
$pet->dob = "2016-05-17";
$pet->weight = 2.5;
$pet->height = 0.03;
$pet->owner_id = 8;
$pet->biteyness = 3;
$pet->save();
*/