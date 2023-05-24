<?php

use PHPUnit\Framework\TestCase;
use App\RomanNumerals;

class RomanNumeralsTest extends TestCase
{
    /**
     *  @test
     * @dataProvider checks
     *  */
    function generateRomanNumerals($number, $numeral)
    {
        $this->assertEquals($numeral, RomanNumerals::generate($number));
    }
    /** @test */
    function cannot_generate_less_than_one()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }
    /** @test */
    function cannot_generate_more_than_four_thousand()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    public function checks()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [50, 'L'],
            [40, 'XL'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M']
        ];
    }

}