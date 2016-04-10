<?php namespace Cyrulik\Dice;

class DiceRoll
{
    /**
     * @var int
     */
    private $times;

    /**
     * @var int
     */
    private $dice;

    /**
     * @var int
     */
    private $number;

    /**
     * @var string|null
     */
    private $operation;

    /**
     * @param string $dice
     */
    public function __construct($dice)
    {
        $roll = preg_split( "/(d|\+|x)/", $dice);

        if (strchr($dice, 'x'))
            $this->operation = 'x';
        elseif (strchr($dice, '+'))
            $this->operation = '+';

        $this->times = $roll[0] ?: 1;
        $this->dice = $roll[1];
        $this->number = isset($roll[2]) ? $roll[2] : 0;
    }

    /**
     * @return int
     */
    public function roll()
    {
        $result = 0;
        
        for ($i = 0; $i < $this->times; $i++) {
            $result += mt_rand(1, $this->dice);
        }

        switch ($this->operation) {
            case '+': $result += $this->number;
                break;

            case 'x': $result *= $this->number;
                break;
        }

        return $result;
    }
}
