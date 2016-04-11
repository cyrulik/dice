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
        $valid = preg_match( '/(\d+)?d(\d+)[\s]?([*|+|\-|\/])?[\s]?(\d+)?/', $dice, $data);

        if (! $valid)
            throw new InvalidArgumentException('Invalid dice code given');

        return (new DiceRoll($data))->roll();
    }
}
