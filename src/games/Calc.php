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
    $playGame = function () {
        $mathActions = ['+', '-', '*'];
        $num1 = random_int(MIN_RANDOM, MAX_RANDOM);
        $num2 = random_int(MIN_RANDOM, MAX_RANDOM);
        $mathActions = getRandMathActions($mathActions);
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
    startGame($playGame, $rule);
}
