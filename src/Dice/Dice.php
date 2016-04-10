<?php namespace Cyrulik\Dice;

use InvalidArgumentException;

class Dice
{
    /**
     * @param string $dice
     * @return int
     * @throws InvalidArgumentException
     */
    public function roll($dice)
    {
        $data = [];
        $valid = preg_match("/\d*d{1}\d+(\+|x)?\d*/i", $dice, $data);

        if (! $valid)
            throw new InvalidArgumentException('Invalid dice code given');

        return (new DiceRoll($dice))->roll();
    }
}
