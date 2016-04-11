<?php

namespace spec\Cyrulik\Dice;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DiceSpec extends ObjectBehavior
{
    function let()
    {
        mt_srand(0);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Cyrulik\Dice\Dice');
    }

    function it_can_roll_a_six_sided_dice()
    {
        $this->roll('d6')->shouldBe(3);
    }

    function it_can_roll_two_six_sided_dice()
    {
        $this->roll('2d6')->shouldBe(7);
    }

    function it_can_roll_two_six_sided_dice_and_add_three()
    {
        $this->roll('2d6+3')->shouldBe(10);
    }

    function it_can_roll_one_six_sided_dice_and_multiply_result_by_four()
    {
        $this->roll('1d6*4')->shouldBe(12);
    }
}
