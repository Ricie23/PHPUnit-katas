<?php
use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    function emptyStringis0()
    {
        $calculator = new StringCalculator();
        $this->assertSame(0, $calculator->add(''));
    }

    /** @test  */
    function sumOfSingleNumber()
    {
        $calculator = new StringCalculator();
        $this->assertSame(5, $calculator->add('5'));
    }

    /** @test  */
    function sumOfTwoNumbers()
    {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add('5, 5'));
    }

    /** @test  */
    function sumOfAnyNumbers()
    {
        $calculator = new StringCalculator();
        $this->assertSame(29, $calculator->add('5, 5 ,5, 14'));
    }

    /** @test  */
    function newLineAsDelimeter()
    {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add("5\n5"));
    }

    /** @test */
    function supportCustomDelimeters()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(20, $calculator->add("//:\n5:4:11"));
    }

    /** @test  */
    function noNegativeNumbers()
    {
        $calculator = new StringCalculator();

        $this->expectException(\Exception::class);

        $calculator->add('5, -4');

    }
    function BiggerThan1000()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(5, $calculator->add('5, 1001'));
    }

}