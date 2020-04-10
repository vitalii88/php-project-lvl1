<?php

namespace BrainGames\core;

const CORRECT_STRIKE = 3;
const MIN_RANDOM = 2;
const MAX_RANDOM = 100;

use function cli\line;
use function cli\prompt;

function startGame($dataArr)
{
  // Выносим приветствие, правила и узнаем имя
    line("Welcome to Brain Games");
    line("{$dataArr['rule']}");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

//---------- получение ответа через ф-цию не работает ---------
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        echo "Question:" . $dataArr['question'][$i], PHP_EOL;
        echo "Your answer: ";
        $playerAnswer = trim(fgets(STDIN));

        if ($playerAnswer != $dataArr['correctAnswer'][$i]) {
            echo "{$playerAnswer} is wrong answer :(. Correct answer was {$dataArr['correctAnswer'][$i]}", PHP_EOL;
            echo "Let's try again, {$name}", PHP_EOL;
            exit;
        } else {
            echo "Correct!", PHP_EOL;
        }
    }
//------------

    echo "Congratulations {$name}", PHP_EOL;
}
