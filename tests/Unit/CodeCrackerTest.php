<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\CodeCracker;

class CodeCrackerTest extends TestCase
{
    public function setUp() : void
    {
        $this->codeCracker = new CodeCracker();
    }

    public function test1()
    {
        $code = "!";

        $this->assertSame("a", $this->codeCracker->crack($code));
    }

    public function test2()
    {
        $code = "!)";

        $this->assertSame("ab", $this->codeCracker->crack($code));
    }

    public function test3()
    {
        $code = "!)!";

        $this->assertSame("aba", $this->codeCracker->crack($code));
    }

    public function test4()
    {
        $code = "!)! )!";

        $this->assertSame("aba ba", $this->codeCracker->crack($code));
    }

    public function test5()
    {
        $code = "i£hi >i";

        $this->assertSame("test it", $this->codeCracker->crack($code));
    }

    public function test6()
    {
        $code = ">h >i ldg@>c%";

        $this->assertSame("is it working", $this->codeCracker->crack($code));
    }

    // public function testFull()
    // {
    //     $cracker = new CodeCracker("! ) # ( £ * % & > < @ a b c d e f g h i j k l m n o");
    //     $this->assertSame("hello mum", $cracker->crack("&£aad bjb"));
    // }
}

/*
a b c d e f g h i j k l m n o p q r s t u v w x y z
! ) # ( £ * % & > < @ a b c d e f g h i j k l m n o
*/
