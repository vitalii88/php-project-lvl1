<?php

namespace BrainGames\Calc;

use function BrainGames\core\{startGame, getRandom};

use const BrainGames\core\CORRECT_STRIKE;

function startCalcGame()
{

################ условие задачи ################
    $rule = "What is the result of the expression?";

################ масив с действиями ################
    $mathActionsArr = ['+', '-', '*'];
################ рандомайзер для действий ################
    function getRandMathActions($mathActionsArr)
    {
        return $mathActionsArr[array_rand($mathActionsArr)];
    }
    ################ Задание и Правельные ответы ################
    $questionArr = [];
    $correctAnswerArr = [];
    // Циклом создаем условия и сразу решаем его
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $num1 = getRandom();
        $num2 = getRandom();
        switch (getRandMathActions($mathActionsArr)) {
            case '-':
                $questionArr[] = $num1 . '-' . $num2;
                $correctAnswerArr[] = $num1 - $num2;
                break;
            case '+':
                $questionArr[] = $num1 . '+' . $num2;
                $correctAnswerArr[] = $num1 + $num2;
                break;
            case '*':
                $questionArr[] = $num1 . '*' . $num2;
                $correctAnswerArr[] = $num1 * $num2;
                break;
        }
    }
    ############### Обращаемся к движку ###############
    startGame($rule, $questionArr, $correctAnswerArr);
}
