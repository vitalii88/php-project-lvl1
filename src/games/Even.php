<?php

namespace BrainGames\Even;

use function BrainGames\core\{startGame, getRandom};

use const BrainGames\core\CORRECT_STRIKE as CORRECT_STRIKE;

function startEvenGame()
{
    // Правила
    $rule = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    // Пишем в массив вопросы
    $questionArr = [];
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $questionArr[] = getRandom();
    }
    //создаем массив с ответами
    $correctAnswerArr = [];
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        ($questionArr[$i] % 2 == 0) ? $correctAnswerArr[] = "yes" : $correctAnswerArr[] = "no";
    }
    startGame($rule, $questionArr, $correctAnswerArr);
}
