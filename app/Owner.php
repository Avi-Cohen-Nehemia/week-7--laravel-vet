<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ["first_name", "last_name", "address_1", "address_2", "town", "postcode", "telephone"];

    public function fullName() : string
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function fullAddress() : string
    {
        return "{$this->address_1}, {$this->address_2}, {$this->town}, {$this->postcode}";
    }

    public function formattedPhoneNumber()
    {
        $number = $this->telephone;

        if(preg_match( '/^(\d{4})(\d{3})(\d{4})$/', $number,  $matches)) {
        $formatted = $matches[1] . " " . $matches[2] ." " . $matches[3];
        }

        return $formatted;
    }
}

/*
$owner = new Owner();
$owner->first_name = "Helen";
$owner->last_name = "Whitby";
$owner->telephone = "01176888758";
$owner->address_1 = "Stalker Rd";
$owner->address_2 = "Filton";
$owner->town = "Bristol";
$owner->postcode = "BS12 2ER";
*/
