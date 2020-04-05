<?php

namespace BrainGames\Prime;

use function BrainGames\core\{startGame, getRandom};

use const   BrainGames\core\{CORRECT_STRIKE, MAX_RANDOM};

function startPrimeGame()
{
    ################ условие задачи ################
    $rule = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

    ################ Инициализирую массивы для воросов и ответов ################
    $questionArr = [];
    $correctAnswerArr = [];

    ################ генерим массив с простыми числами в диапазоне MAX_RANDOM ################
// $num = 100;
// function fibonachi($num)
// {
//     // Формула
//     // f(0) = 0
//     // f(1) = 1
//     // f(n) = f(n-1) + f(n-2)
//     $arr = [];
//     $f0 = 0;
//     $f1 = 1;
//     $fn = '';
//     $i = 0;
//     while ($i < $num - 1) {
//         $fn = $f0 + $f1;
//         $f0 = $f1;
//         $f1 = $fn;
//         $arr[] = $fn;
//         $i++;
//     }
//     return $arr;
// }

// function sieve2($num)
// {
//     $S = [];
//     // заполняем решето единицами
//     for($k=1; $k<=$num; $k++)
//             $S[$k]=1;
   
//     for($k=1; (2*$k+1)*(2*$k+1)<=2*$num+1; $k++){
//             // если 2k+1 - простое (т. е. k не вычеркнуто)
//             if($S[$k]==1){
//                     // то вычеркнем кратные 2k+1
//                     for($l=3*$k+1; $l<=$num; $l+=2*$k+1){
//                             $S[$l]=0;
//                             }
//                     }
//             }
//     // теперь S[k]=1 тогда и только тогда, когда 2k+1 - простое
//     return $S;
// }

    $sqrLimit = floor(sqrt(MAX_RANDOM));
    $primeArr = array_fill(2, MAX_RANDOM - 1, true);

    for ($i = 2; $i <= $sqrLimit; $i++) {
        if ($primeArr[$i] === true) {
            for ($j = $i * $i; $j <= MAX_RANDOM; $j += $i) {
                $primeArr[$j] = false;
            }
        }
    }

################ Генерим вопросы ################
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $questionArr[] = getRandom();
    }

################  Генерим правельные ответы  ################
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        // $a = $questionArr[$i];
        // if ($primeArr[$a] == 1) {
        //     $correctAnswerArr[] = "yes";
        // } else {
        //     $correctAnswerArr[] = "no";
        // }
        ($primeArr[$questionArr[$i]] == 1) ? $correctAnswerArr[] = "yes" : $correctAnswerArr[] = "no";
    }

    ################
    // $zzz = sieve2($num);
    // echo "Простые числа:\n";
    // print_r($primeArr);
    // echo "Вопросы:\n";
    // print_r($questionArr);
    // echo "Ответы:\n";
    // print_r($correctAnswerArr);

    ################  Запуск движка  ################
    startGame($rule, $questionArr, $correctAnswerArr);
}
