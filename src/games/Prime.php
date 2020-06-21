<?php

namespace BrainGames\Prime;

use function BrainGames\core\startGame;

use const   BrainGames\core\{MAX_RANDOM, MIN_RANDOM};

function isPrime($num)
{
    // if ($num === 1 || $num === 0) {
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function startPrimeGame()
{
    $rule = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $playGame = function () {

        $question = random_int(MIN_RANDOM, MAX_RANDOM);
        $answer = (isPrime($question) === true) ? "yes" : "no";
        return [$question, $answer];
    };
    ################  Запуск движка  ################
    startGame($playGame, $rule);
}
