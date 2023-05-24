<?php
use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @test
     */
    public function multiplesOf3()
    {
        foreach ([3, 6, 9, 12] as $number) {
            $this->assertEquals('fizz', FizzBuzz::convert($number));
        }

    }
    /**
     * @test
     */
    public function multiplesOf5()
    {
        foreach ([5, 10, 20, 25] as $number) {
            $this->assertEquals('buzz', FizzBuzz::convert($number));
        }
    }
    /**
     * @test
     */
    public function multiplesOf3And5()
    {
        foreach ([15, 30, 45, 60] as $number) {
            $this->assertEquals('fizzbuzz', FizzBuzz::convert($number));
        }
    }
    /**
     * @test
     */
    public function returnOriginalNumber()
    {
        foreach ([1, 2, 4, 7, 8, 11] as $number) {
            $this->assertEquals($number, FizzBuzz::convert($number));
        }
    }

}