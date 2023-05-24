<?php

use App\TennisMatch;
use App\Player;
use PHPUnit\Framework\TestCase;


class TennisMatchTest extends TestCase
{
    /** 
     * @test
     * @dataProvider scores
     *  */
    function ScoresForTennisMatch($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch(
            $john = new Player('John'),
            $jim = new Player('Jim'),
        );

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $john->score();
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $jim->score();
        }

        $this->assertEquals($score, $match->score());
    }
    public static function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 0, 'forty-love'],
            [3, 3, 'deuce'],
            [4, 4, 'deuce'],
            [4, 3, 'Advantage: John'],
            [3, 4, 'Advantage: Jim'],
            [4, 0, 'Winner: John'],
            [0, 4, 'Winner: Jim']

        ];
    }
}