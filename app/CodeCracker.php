<?php

namespace App;

class CodeCracker
{
    private $dictionary = [
        "!" => "a",
        ")" => "b",
        "#" => "c",
        "(" => "d",
        "£" => "e",
        "*" => "f",
        "%" => "g",
        "&" => "h",
        ">" => "i",
        "<" => "j",
        "@" => "k",
        "a" => "l",
        "b" => "m",
        "c" => "n",
        "d" => "o",
        "e" => "p",
        "f" => "q",
        "g" => "r",
        "h" => "s",
        "i" => "t",
        "j" => "u",
        "k" => "v",
        "l" => "w",
        "m" => "x",
        "n" => "y",
        "o" => "z",
        " " => " "
    ];

    public function crack($code)
    {
        $split = mb_str_split($code);

        $cracked = "";

        foreach ($split as $i => $symbol) {

            foreach ($this->dictionary as $key => $letter) {

                if ($symbol === $key) {
                    $cracked .= $letter;
                }
            }
        }

        return $cracked;
    }
}

/*
a b c d e f g h i j k l m n o p q r s t u v w x y z
! ) # ( £ * % & > < @ a b c d e f g h i j k l m n o
*/

// private $alphabet
// private $dictionary;

// public function __construct(string $string)
// {
//     $this->alphabet = range("a", "z");
//     $this->string = str_replace(" ", "", $string);

//     $myKeysList = preg_split('/[a-zA-Z!)#(£*&%><@]/', $string);

//     foreach ($myKeysList as $key => $value) {
//         $dictionary[] = $value;
//     }

//     $this->dictionary = $dictionary;
// }