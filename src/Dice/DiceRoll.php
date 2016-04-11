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
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->times = $data[1] ?: 1;
        $this->dice = $data[2];
        $this->operation = isset($data[3]) ? $data[3] : null;
        $this->number = isset($data[4]) ? $data[4] : null;
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

            case '-': $result -= $this->number;
                break;

            case '/': $result /= $this->number;
                break;

            case '*': $result *= $this->number;
                break;
        }

        return $result;
    }
}
