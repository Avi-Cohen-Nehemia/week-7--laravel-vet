<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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