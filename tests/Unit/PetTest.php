<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Pet;

class PetTest extends TestCase
{
    public function testDangerous()
    {
        $pet1 = new Pet ([
            "biteyness" => 1,
        ]);
        $pet2 = new Pet ([
            "biteyness" => 2,
        ]);
        $pet3 = new Pet ([
            "biteyness" => 3,
        ]);
        $pet4 = new Pet ([
            "biteyness" => 4,
        ]);
        $pet5 = new Pet ([
            "biteyness" => 5,
        ]);

        $this->assertFalse($pet1->dangerous());
        $this->assertFalse($pet2->dangerous());
        $this->assertTrue($pet3->dangerous());
        $this->assertTrue($pet4->dangerous());
        $this->assertTrue($pet5->dangerous());
    }
}
