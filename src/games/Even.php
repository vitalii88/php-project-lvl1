<?php

namespace BrainGames\Even;

use function BrainGames\core\startGame;

use const BrainGames\core\{MIN_RANDOM, MAX_RANDOM};

function startEvenGame()
{
    $rule = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $playGame = function () {
        $question = random_int(MIN_RANDOM, MAX_RANDOM);
        $answer = $question % 2 == 0 ? "yes" : "no";
        return [$question, $answer];
    };

    startGame($playGame, $rule);
}
