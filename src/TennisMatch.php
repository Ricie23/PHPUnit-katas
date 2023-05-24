<?php

namespace App;

class TennisMatch
{

    protected Player $playerOne;
    protected Player $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }
    public function score()
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader()->name;
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader()->name;
            ;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            "%s-%s",
            $this->playerOne->toTerm(),
            $this->playerTwo->toTerm(),
        );
    }

    protected function hasWinner(): bool
    {
        if (max([$this->playerOne->points, $this->playerTwo->points]) < 4) {
            return false;
        }
        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;

    }

    /**
     * @return string
     */
    protected function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points ? $this->playerOne : $this->playerTwo;
    }
    /**
     * @return bool
     */
    protected function isDeuce(): bool
    {

        return $this->pointsPastThree() && $this->playerOne->points == $this->playerTwo->points;
    }
    /**
     * @return bool
     */
    protected function hasAdvantage(): bool
    {
        if ($this->pointsPastThree()) {
            return !$this->isDeuce();
        }
        return false;

    }
    /**
     * @return bool
     */
    protected function pointsPastThree(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}