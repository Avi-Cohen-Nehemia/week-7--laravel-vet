<?php

namespace App;

class FizzBuzz
{
    public function forNumber($number)
    {
        $result = "";

        if ($number % 3 === 0) {
            $result .= "Fizz";
        }
        
        if ($number % 5 === 0) {
            $result .= "Buzz";
        }

        if ($number % 7 === 0) {
            $result .= "Rarr";
        }

        if ($result === "") {
            $result .= $number;
        }

        return $result;
    } 
}