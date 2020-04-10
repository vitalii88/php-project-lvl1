<?php

namespace BrainGames\Prime;

use function BrainGames\core\startGame;

use const   BrainGames\core\{CORRECT_STRIKE, MAX_RANDOM, MIN_RANDOM};

function startPrimeGame()
{
################ Инициализирую массивы для воросов и ответов ################
    $dataArr = [
        'rule' => [],
        'question' => [],
        'correctAnswer' => [],
    ];
    ################ условие задачи ################
    $dataArr ['rule'] = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
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
        $dataArr['question'][] = random_int(MIN_RANDOM, MAX_RANDOM);
    }
    ################  Генерим правельные ответы  ################
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        ($primeArr[$dataArr['question'][$i]] == 1)
        ? $dataArr['correctAnswer'][] = "yes" : $dataArr['correctAnswer'][] = "no";
    }
    ################  Запуск движка  ################
    startGame($dataArr);
}
