<?php

namespace BrainGames\core;

const ROUNDS_COUNT = 3;
const MIN_RANDOM = 2;
const MAX_RANDOM = 100;

use function cli\line;
use function cli\prompt;

function startGame($playGame, $rule)
{
// Выносим приветствие, правила и узнаем имя
    line("Welcome to Brain Games");
    line($rule);
    $name = prompt("May I have your name?");
    line("Hello, " . $name . "!");

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $answer] = $playGame();
        line("Question: " . $question);
        $playerAnswer = prompt("Your answer");

        if ($playerAnswer != $answer) {
            line($playerAnswer . " is wrong answer :(. Correct answer was " . $answer);
            line("Let's try again, " . $name);
            return false;
        } else {
            line("Correct!");
        }
    }

    return line("Congratulations " . $name);
}
