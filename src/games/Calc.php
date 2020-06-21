<?php

namespace BrainGames\Calc;

use function BrainGames\core\startGame;

use const BrainGames\core\{MIN_RANDOM, MAX_RANDOM};

function startCalcGame()
{
################ условие задачи ################
    $rule = "What is the result of the expression?";
    ################ передаем в движок ################
    $playGame = function () {
        $mathAction = ['+', '-', '*'];
        $num1 = random_int(MIN_RANDOM, MAX_RANDOM);
        $num2 = random_int(MIN_RANDOM, MAX_RANDOM);
        $randomAction = $mathAction[array_rand($mathAction)];
        $question = $num1 . $randomAction . $num2;
        switch ($randomAction) {
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
