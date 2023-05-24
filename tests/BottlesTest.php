<?php
use App\Bottles;
use PHPUnit\Framework\TestCase;

class BottlesTest extends TestCase
{
    /** @test */
    public function songLyrics()
    {
        $expected = file_get_contents(__DIR__ . '/stubs/lyrics.stub');
        $result = (new Bottles)->sing();
        $this->assertEquals($result, $expected);
    }
    /** @test */
    public function firstVerse()
    {
        $expected = <<<EOT
        99 bottles of beer on the wall,
        99 bottles of beer.
        Take one down and pass it around,
        98 bottles of beer on the wall.

        EOT;
        $result = (new Bottles)->verse(99);
        $this->assertEquals($expected, $result);
    }
    /** @test */
    public function secondVerse()
    {
        $expected = <<<EOT
        98 bottles of beer on the wall,
        98 bottles of beer.
        Take one down and pass it around,
        97 bottles of beer on the wall.

        EOT;
        $result = (new Bottles)->verse(98);
        $this->assertEquals($expected, $result);
    }
    /**@test */
    public function twoBottles()
    {
        $expected = <<<EOT
        2 bottles of beer on the wall,
        2 bottles of beer.
        Take one down and pass it around,
        1 bottle of beer on the wall.

        EOT;
        $result = (new Bottles)->verse(2);
        $this->assertEquals($expected, $result);
    }
    /**@test */
    public function oneBottle()
    {
        $expected = <<<EOT
        1 bottle of beer on the wall,
        1 bottles of beer.
        Take one down and pass it around,
        No more bottles of beer on the wall.

        EOT;
        $result = (new Bottles)->verse(1);
        $this->assertEquals($expected, $result);
    }
    /**@test */
    public function lastVerse()
    {
        $expected = <<<EOT
            No more bottles of beer on the wall,
            No more bottles of beer.
            Go to the store and buy some more,
            99 bottles of beer on the wall.

        EOT;
        $result = (new Bottles)->verse(0);
        $this->assertEquals($expected, $result);
    }

}