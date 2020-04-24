<?php

namespace BrainGames\Calc;

use function BrainGames\core\startGame;

use const BrainGames\core\{MIN_RANDOM, MAX_RANDOM};

function getRandMathActions($arr)
{
    return $arr[array_rand($arr)];
}

function startCalcGame()
{
################ условие задачи ################
    $rule = "What is the result of the expression?";
    ################ передаем в движок ################
    $getGameData = function () {
        $mathActionsArr = ['+', '-', '*'];
        $num1 = random_int(MIN_RANDOM, MAX_RANDOM);
        $num2 = random_int(MIN_RANDOM, MAX_RANDOM);
        $mathActions = getRandMathActions($mathActionsArr);
        $question = $num1 . $mathActions . $num2;
        switch ($mathActions) {
            case "-":
                $answer = $num1 - $num2;
                break;
            case "+":
                $answer = $num1 + $num2;
                break;
            case "*":
                $answer = $num1 * $num2;
                break;
        }
        return [$question, $answer];
    };
    ############### Обращаемся к движку ###############
    startGame($getGameData, $rule);
}
