<?php
use App\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @test */
    function it_scores_a_gutter_game_as_zero()
    {
        $game = new Game();

        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(0, $game->score());
    }

    /** @test */
    function it_scores_all_ones()
    {
        $game = new Game();

        foreach (range(1, 20) as $roll) {
            $game->roll(1);
        }
        $this->assertSame(20, $game->score());
    }

    /** @test */
    function spareBonus()
    {
        $game = new Game();
        $game->roll(5);
        $game->roll(5);
        $game->roll(8);
        foreach (range(1, 17) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(26, $game->score());
    }

    /** @test */
    function strikeBonus()
    {
        $game = new Game();
        $game->roll(10);
        $game->roll(5);
        $game->roll(2);

        foreach (range(1, 16) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(24, $game->score());
    }

    /** @test */
    function spareOnFinal()
    {
        $game = new Game();
        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }
        $game->roll(5);
        $game->roll(5);

        $game->roll(5);
        $this->assertSame(15, $game->score());
    }

    /** @test */
    function strikeOnFinal()
    {
        $game = new Game();
        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }
        $game->roll(10);
        $game->roll(10);

        $game->roll(10);
        $this->assertSame(30, $game->score());
    }

    /** @test */
    function perfectGame()
    {
        $game = new Game();
        foreach (range(1, 12) as $roll) {
            $game->roll(10);
        }

        $this->assertSame(300, $game->score());
    }

}