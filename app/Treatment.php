<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pet;
use Illuminate\Support\Collection;

class Treatment extends Model
{
    protected $fillable = ["name"];

    // don't need timestamps
    // no idea why this one is public
    public $timestamps = false;

    // using the belongsToMany() method
    // as it's a many-to-many relationship
    public function pets()
    {
        return $this->belongsToMany(Pet::class);
    }

    static public function fromString(string $string) : Treatment
    {
        //first trim the passed string to make sure it doesn's have leftover whitespace
        $string = trim($string);
        $treatment = Treatment::where("name", $string)->first();

        if ($treatment) {
            return $treatment;
        }

        return Treatment::create(["name" => $string]);
    }

    //we need to have an option for when the user want to add multiple treatments
    static public function fromStrings(array $strings) : Collection
    {
        return collect($strings)->map([Treatment::class, "fromString"])->unique("name");
    }
}
