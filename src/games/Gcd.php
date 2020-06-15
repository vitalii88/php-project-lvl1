<?php

namespace BrainGames\Gcd;

use function BrainGames\core\startGame;

use const BrainGames\core\{MIN_RANDOM, MAX_RANDOM};

function getGcd($num1, $num2)
{
    while ($num1 != $num2) {
        ($num1 > $num2) ? $num1 = $num1 - $num2 : $num2 = $num2 - $num1;
    }
    return $num1;
}

function startGcdGame()
{
    $rule = "Find the greatest common divisor of given numbers.";
    ################ передаем в движок ################
    $playGame = function () {
        $num1 = random_int(MIN_RANDOM, MAX_RANDOM);
        $num2 = random_int(MIN_RANDOM, MAX_RANDOM);
//        $question = "$num1 $num2";
        $question = $num1 . " " . $num2;
        $answer = getGcd($num1, $num2);
        return [$question, $answer];
    };
    startGame($playGame, $rule);
}
