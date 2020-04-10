<?php

namespace BrainGames\Even;

use function BrainGames\core\startGame;

use const BrainGames\core\{CORRECT_STRIKE, MIN_RANDOM, MAX_RANDOM};

function startEvenGame()
{
    $dataArr = [
        'rule' => [],
        'question' => [],
        'correctAnswer' => [],
    ];
    // Правила
    $dataArr['rule'] = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $dataArr['question'][] = random_int(MIN_RANDOM, MAX_RANDOM);
    }
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        ($dataArr['question'][$i] % 2 == 0) ? $dataArr['correctAnswer'][] = "yes" : $dataArr['correctAnswer'][] = "no";
    }
    startGame($dataArr);
}
