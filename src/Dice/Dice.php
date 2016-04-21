<?php namespace Cyrulik\Dice;

use InvalidArgumentException;

class Dice
{    
    /**
     * @param string $dice
     * @return int
     * @throws InvalidArgumentException
     */
    public static function roll($dice)
    {
        $data = [];
        $valid = preg_match( '/(\d+)?d(\d+)[\s]?([*|+|\-|\/])?[\s]?(\d+)?/', $dice, $data);

        if (! $valid)
            throw new InvalidArgumentException('Invalid dice code given');

        return self::calculate($data);
    }

    /**
     * @param array $data
     * @return int
     */
    private static function calculate(array $data)
    {
        $result = 0;

        $times = $data[1] ?: 1;
        $dice = $data[2];

        for ($i = 0; $i < $times; $i++) {
            $result += mt_rand(1, $dice);
        }

        if (isset($data[3]) && isset($data[4])) {
            switch ($data[3]) {
                case '+':
                    $result += $data[4];
                    break;

                case '-':
                    $result -= $data[4];
                    break;

                case '*':
                    $result *= $data[4];
                    break;

                case '/':
                    $result = (int)ceil($result / $data[4]);
                    break;
            }
        }

        return $result;
    }
}
