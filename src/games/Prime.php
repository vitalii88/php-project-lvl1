<?php

namespace BrainGames\Prime;

use function BrainGames\core\startGame;

use const   BrainGames\core\{MAX_RANDOM, MIN_RANDOM};

function getPrime($arr, $limit)
{
    for ($i = 2; $i <= $limit; $i++) {
        if ($arr[$i] === true) {
            for ($j = $i * $i; $j <= MAX_RANDOM; $j += $i) {
                $arr[$j] = false;
            }
        }
    }
    return $arr;
}

function startPrimeGame()
{
    $rule = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

    $getGameData = function () {
        $sqrLimit = floor(sqrt(MAX_RANDOM));
        $primeArr = array_fill(2, MAX_RANDOM - 1, true);
        $primeArr = getPrime($primeArr, $sqrLimit);
        $question = random_int(MIN_RANDOM, MAX_RANDOM);
        
        ($primeArr[$question] == 1) ? $answer = "yes" : $answer = "no";
        return [$question, $answer];
    };
    ################  Запуск движка  ################
    startGame($getGameData, $rule);
}
