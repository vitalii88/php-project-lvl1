<?php

namespace BrainGames\Gcd;

use function BrainGames\core\{startGame, getRandom};

use const BrainGames\core\CORRECT_STRIKE as CORRECT_STRIKE;

function startGcdGame()
{
################ условие задачи ################
    $rule = "Find the greatest common divisor of given numbers.";
################ массив с вопросом  и ответом ################
    $questionArr = [];
    $correctAnswerArr = [];
################   ################
    // Пишем в массивы задачу и ответы
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $num1 = getRandom();
        $num2 = getRandom();
        $questionArr[] = "$num1 $num2";
        while ($num1 != $num2) {
            ($num1 > $num2) ? $num1 = $num1 - $num2 : $num2 = $num2 - $num1;
        }
        $correctAnswerArr[] = $num1;
    }
    startGame($rule, $questionArr, $correctAnswerArr);
}
