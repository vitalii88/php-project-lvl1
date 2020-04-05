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
        ($primeArr[$questionArr[$i]] == 1) ? $correctAnswerArr[] = "yes" : $correctAnswerArr[] = "no";
    }
    ################  Запуск движка  ################
    startGame($rule, $questionArr, $correctAnswerArr);
}
