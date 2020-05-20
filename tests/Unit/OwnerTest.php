<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Owner;
use App\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OwnerTest extends TestCase
{
    use RefreshDatabase;

    public function testFillable()
    {
        $owner = new Owner([
            "first_name" => "First",
            "last_name" => "Last",
            "telephone" => "01112223333",
            "address_1" => "Somewhere",
            "address_2" => "Over The",
            "town" => "Rainbow",
            "postcode" => "RB12 3OT",
            "random_data" => "Nope!"
        ]);
        
        // first_name etc. should be set, as it's in $fillable
        $this->assertSame("First", $owner->first_name);
        $this->assertSame("Last", $owner->last_name);
        $this->assertSame("01112223333", $owner->telephone);
        $this->assertSame("Somewhere", $owner->address_1);
        $this->assertSame("Over The", $owner->address_2);
        $this->assertSame("Rainbow", $owner->town);
        $this->assertSame("RB12 3OT", $owner->postcode);

        $this->assertSame(null, $owner->random_data);
    }

    public function testValidPhoneNumber()
    {
        $owner1 = new Owner([
            "telephone" => "01123443333",
        ]);
        $owner2 = new Owner([
            "telephone" => "01563454633",
        ]);
        $owner3 = new Owner([
            "telephone" => "01133322233",
        ]);
        $owner4 = new Owner([
            "telephone" => "03333333333",
        ]);
        $owner5 = new Owner([
            "telephone" => "07777776666",
        ]);
        $owner6 = new Owner([
            "telephone" => "07776666",
        ]);

        $this->assertTrue($owner1->validPhoneNumber());
        $this->assertTrue($owner2->validPhoneNumber());
        $this->assertTrue($owner3->validPhoneNumber());
        $this->assertTrue($owner4->validPhoneNumber());
        $this->assertTrue($owner5->validPhoneNumber());
        $this->assertFalse($owner6->validPhoneNumber());
    }

    public function testDatabase()
    {
        // add an owner to the database
        Owner::create([
            "first_name" => "First",
            "last_name" => "Last",
            "telephone" => "01112223333",
            "address_1" => "Somewhere",
            "address_2" => "Over The",
            "town" => "Rainbow",
            "postcode" => "RB12 3OT",
        ]);

        // get the first owner back from the database
        $ownerFromDB = Owner::all()->first();

        // check the first_name match
        $this->assertSame("First", $ownerFromDB->first_name);
    }

    //helper function for testNumberOfPets()
    public function addOwnerAndPets($number)
    {
        $owner = Owner::create();

        for ($i = 0; $i < $number; $i += 1) { 
            Pet::create([
                "pet_name" => "Generic",
                "animal_type" => "animal",
                "dob" => "2010-10-10",
                "weight" => 2.5,
                "height" => 0.10,
                "owner_id" => $owner->id,
                "biteyness" => 2,
            ]);
        }

        return $owner;
    }

    public function testNumberOfPets()
    {
        $this->addOwnerAndPets(0);
        $ownerFromDB1 = Owner::find(1);
        $this->assertSame(0, $ownerFromDB1->numberOfPets());

        $this->addOwnerAndPets(1);
        $ownerFromDB2 = Owner::find(2);
        $this->assertSame(1, $ownerFromDB2->numberOfPets());

        $this->addOwnerAndPets(2);
        $ownerFromDB3 = Owner::find(3);
        $this->assertSame(2, $ownerFromDB3->numberOfPets());
    }
}