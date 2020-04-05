<?php

namespace BrainGames\core;

const CORRECT_STRIKE = 3;
const MIN_RANDOM = 2;
const MAX_RANDOM = 100;

function startGame($rule, $questionArr, $correctAnswerArr)
{
  // Выносим приветствие, правила и узнаем имя
    echo "Welcome to Brain Games", PHP_EOL;
    echo "{$rule}", PHP_EOL;
    echo "May I have your name? ", PHP_EOL;
    $name = trim(fgets(STDIN));
    echo "Hello, {$name}!", PHP_EOL;

    //---------------- Ф-ции правильного ответа --------------
    // function getAnswer() {
    //     $playerAnswer = trim(fgets(STDIN));
    //     //print_r("Print playerAnswer: $playerAnswer\n");
    //     return $playerAnswer;
    // }

    // $getAnswer = function () {
    //     $playerAnswer = trim(fgets(STDIN));
        //print_r("Print playerAnswer: $playerAnswer\n");
    //     return $playerAnswer;
    // };
//---------- получение ответа через ф-цию не работает ---------
    //$correctStrike = 3;
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        echo "Question:" . $questionArr[$i], PHP_EOL;
        echo "Your answer: ";
        $playerAnswer = trim(fgets(STDIN));

        if ($playerAnswer != $correctAnswerArr[$i]) {
            echo "{$playerAnswer} is wrong answer :(. Correct answer was {$correctAnswerArr[$i]}", PHP_EOL;
            echo "Let's try again, {$name}", PHP_EOL;
            exit;
        } else {
            echo "Correct!", PHP_EOL;
        }
    }
//------------

    echo "Congratulations {$name}", PHP_EOL;
}

function getRandom()
{
    return random_int(MIN_RANDOM, MAX_RANDOM);
}
