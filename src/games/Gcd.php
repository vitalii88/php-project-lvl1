<?php

namespace BrainGames\Gcd;

use function BrainGames\core\startGame as startGame;
use function BrainGames\Even\getRandom as getRandom;

use const BrainGames\core\CORRECT_STRIKE as CORRECT_STRIKE;

function startGcdGame()
{
################ условие задачи ################
    $rule = "Find the greatest common divisor of given numbers.";

################ массив с вопросом  ################

    $questionArr = [];

################ массив с ответом  ################

    $correctAnswerArr = [];

################   ################
    // function getGcd($num)
    // {
        // for ($i = 2; $i <= $num; $i++) {
        //     if ($num % $i == 0) {
        //         //echo "делитель1: $i\n";
        //         $numArr[] = $i;
        //         $num = $num / $i;
        //         $i = 2;
        //     }
        // }
        // $i = 2;
        // while ($i <= $num) {
        //     if ($num % $i == 0) {
        //         //echo "делитель1: $i\n";
        //         $numArr[] = $i;
        //         $num = $num / $i;
        //         $i = 2;
        //     }
        // }


    //     return $numArr;
    // }

    // Пишем в массивы задачу и ответы
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $num1 = getRandom();
        $num2 = getRandom();
        // $num1 = 36;
        // $num2 = 48;
        $questionArr[] = "$num1 $num2";
        // echo "num1 = $num1   num2 = $num2\n";
        // $numArr1 = getGcd($num1);
        // $numArr2 = getGcd($num2);

        // вычесляем ответ
        // используем Алгоритм Евклида через вычетание
        while ($num1 != $num2) {
            if ($num1 > $num2) {
                $num1 = $num1 - $num2;
            } else {
                $num2 = $num2 - $num1;
            }
        }
        //echo "$num1\n";
        $correctAnswerArr[] = $num1;
    }

    startGame($rule, $questionArr, $correctAnswerArr);
}
