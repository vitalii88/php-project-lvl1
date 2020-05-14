<?php

namespace BrainGames\Prime;

use function BrainGames\core\startGame;

use const   BrainGames\core\{MAX_RANDOM, MIN_RANDOM};

function isPrime($num)
{
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function startPrimeGame()
{
    $rule = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

    $getGameData = function () {

        $question = random_int(MIN_RANDOM, MAX_RANDOM);
        (isPrime($question) === true) ? $answer = "yes" : $answer = "no";
        return [$question, $answer];
    };
    ################  Запуск движка  ################
    startGame($getGameData, $rule);
}
