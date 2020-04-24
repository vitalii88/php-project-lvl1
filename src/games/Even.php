<?php

namespace BrainGames\Even;

use function BrainGames\core\startGame;

use const BrainGames\core\{MIN_RANDOM, MAX_RANDOM};

function startEvenGame()
{
    $rule = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $getGameData = function () {
        $question = random_int(MIN_RANDOM, MAX_RANDOM);
        ($question % 2 == 0) ? $answer = "yes" : $answer = "no";
        return [$question, $answer];
    };

    startGame($getGameData, $rule);
}
