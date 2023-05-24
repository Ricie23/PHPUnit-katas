<?php

namespace App;

use Exception;
use SebastianBergmann\Type\VoidType;


class StringCalculator
{
    const MAX_NUMBER = 1000;
    protected $delimeter = ",|\n";
    public function add(string $numbers)
    {

        if (!$numbers) {
            return 0;
        }

        $numbers = $this->parseString($numbers);

        $numbers = $this->disallowNegativeNumbers($numbers)->ignoreGreaterThanMax($numbers);

        return array_sum($numbers);
    }
    protected function disallowNegativeNumbers(array $numbers): StringCalculator
    {
        foreach ($numbers as $number) {

            if ($number < 0) {
                throw new Exception('Negative numbers are not allowed');
            }


        }
        return $this;
    }
    protected function parseString(string $numbers)
    {

        $customDelimeter = "\/\/(.)\n";

        if (preg_match("/{$customDelimeter}/", $numbers, $matches)) {
            $this->delimeter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

        return $numbers = preg_split("/{$this->delimeter}/", $numbers);

    }
    protected function ignoreGreaterThanMax(array $numbers)
    {
        return array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER;
        });
    }
}