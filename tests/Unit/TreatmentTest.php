<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Treatment;
use Illuminate\Support\Collection;

class TreatmentTest extends TestCase
{
    use RefreshDatabase;

/*
    public function testFromString1()
    {
        // call the Treatment::fromString static method
        $result = Treatment::fromString("Test");

        // check we get back a Tag
        // using assertInstanceOf to check the class
        $this->assertInstanceOf(Treatment::class, $result);

        // check the tag has the right name
        $this->assertSame("Test", $result->name);
    }

    //test that it works for any single string passed
    public function testFromString2()
    {
        $result = Treatment::fromString("Hammock");
        $this->assertInstanceOf(Treatment::class, $result);
        $this->assertSame("Hammock", $result->name);
    }
*/

    //our method isn’t done. It should store the tag in the database:
    public function testFromString()
    {
        $result = Treatment::fromString("Test");

        // get the first treatment from the database
        $treatmentFromDB = Treatment::all()->first();

        // check we get a Treatment
        $this->assertInstanceOf(Treatment::class, $treatmentFromDB);

        // check it's got the right name
        $this->assertSame("Test", $treatmentFromDB->name);

        // we don't want to have duplicate treatments
        // in our database so we need to test for no duplicates
        $result = Treatment::fromString("Test");
        $allTreatments = Treatment::where("name", "Test");
        $this->assertSame(1, $allTreatments->count());
    }

    public function testFromStrings()
    {
        // call the fromStrings method
        $result = Treatment::fromStrings(["Test", "Hammock"]);

        // check it's a Collection
        $this->assertInstanceOf(Collection::class, $result);

        // check the first item is "Test"
        $this->assertSame("Test", $result[0]->name);

        // check the second item is "Hammock"
        $this->assertSame("Hammock", $result[1]->name);

        $treatments = Treatment::fromStrings(["Fel-O-Vax Lv-K   ", "Pecti-Cap", "Zymox Ear Cleanser", "Zymox Ear Cleanser", "Rabies"]);

        // testing that our function is trimming the strings
        // and removes any duplicates
        $this->assertSame("Fel-O-Vax Lv-K", $treatments[0]->name);
        $this->assertSame("Pecti-Cap", $treatments[1]->name);
        $this->assertSame("Zymox Ear Cleanser", $treatments[2]->name);
        $this->assertFalse(isset($treatments[3]));
    }
}
