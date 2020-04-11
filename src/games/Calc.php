<?php

namespace BrainGames\Calc;

use function BrainGames\core\startGame;

use const BrainGames\core\{CORRECT_STRIKE, MIN_RANDOM, MAX_RANDOM};

function startCalcGame()
{
################ условие задачи ################
    $dataArr['rule'] = "What is the result of the expression?";

################ масив с действиями ################
    $mathActionsArr = ['+', '-', '*'];
################ рандомайзер для действий ################
    function getRandMathActions($mathActionsArr)
    {
        return $mathActionsArr[array_rand($mathActionsArr)];
    }
    ################ Задание и Правельные ответы ################
    // Циклом создаем условия и сразу решаем его
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $num1 = random_int(MIN_RANDOM, MAX_RANDOM);
        $num2 = random_int(MIN_RANDOM, MAX_RANDOM);
        $mathActions = getRandMathActions($mathActionsArr);
        if ($mathActions == '-') {
            $dataArr['correctAnswer'][] = $num1 - $num2;
        } elseif ($mathActions == '+') {
            $dataArr['correctAnswer'][] = $num1 + $num2;
        } else {
            $dataArr['correctAnswer'][] = $num1 * $num2;
        }
        $dataArr['question'][] = $num1 . $mathActions . $num2;
    }
    ############### Обращаемся к движку ###############
    startGame($dataArr);
}
