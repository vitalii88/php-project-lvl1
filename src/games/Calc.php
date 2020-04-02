<?php

namespace BrainGames\Calc;

use function BrainGames\core\startGame as startGame;
use function BrainGames\Even\getRandom as getRandom;

use const BrainGames\core\CORRECT_STRIKE as CORRECT_STRIKE;

function startCalcGame()
{

################ условие задачи ################
    $rule = "What is the result of the expression?";

################ масив с действиями ################
    $mathActionsArr = ['+', '-', '*'];
    // echo "Массив действий:\n";
    // print_r($mathActionsArr);

################ рандомайзер для действий ################
    // $mathActionsArr = ['+', '-', '*'];
    // echo "Массив действий:\n";
    // print_r($mathActionsArr);
    // $randMathArr = array_rand($mathActionsArr);
    // $randMathActions = $mathActionsArr[$randMathArr];
    // echo "{$randMathActions}\n";

    // --- Упрощаем ---
    // $randMathActions = $mathActionsArr[array_rand($mathActionsArr)];
    // echo "{$randMathActions}\n";

    // --- Делаем функцией ---
    function getRandMathActions($mathActionsArr)
    {
        return $mathActionsArr[array_rand($mathActionsArr)];
    }
    ################ Задание и Правельные ответы ################
    //создадим 2 массива с вопросами и ответами
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
