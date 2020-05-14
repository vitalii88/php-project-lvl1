<?php

namespace BrainGames\core;

const ROUNDS_COUNT = 3;
const MIN_RANDOM = 2;
const MAX_RANDOM = 100;

use function cli\line;
use function cli\prompt;

function startGame($getGameData, $rule)
{
  // Выносим приветствие, правила и узнаем имя
    line("Welcome to Brain Games");
    line("{$rule}");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameData = $getGameData();
        [$question, $answer] = $gameData;
        echo "Question:" . $question, PHP_EOL;
        echo "Your answer: ";
        $playerAnswer = trim(fgets(STDIN));

        if ($playerAnswer != $answer) {
            line("{$playerAnswer} is wrong answer :(. Correct answer was {$answer}");
            return line("Let's try again, {$name}");
        } else {
            line("Correct!");
        }
    }

    line("Congratulations {$name}");
}
