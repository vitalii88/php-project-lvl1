<?php

namespace BrainGames\Gcd;

use function BrainGames\core\startGame;

use const BrainGames\core\{CORRECT_STRIKE, MIN_RANDOM, MAX_RANDOM};

function getNod($num1, $num2)
{
    while ($num1 != $num2) {
        ($num1 > $num2) ? $num1 = $num1 - $num2 : $num2 = $num2 - $num1;
    }
    return $num1;
}

function startGcdGame()
{
    ################ массив с вопросом  и ответом ################
    $dataArr = [
        'rule' => [],
        'question' => [],
        'correctAnswer' => [],
    ];

    $dataArr['rule'] = "Find the greatest common divisor of given numbers.";
    ################   ################
    // Пишем в массивы задачу и ответы
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $num1 = random_int(MIN_RANDOM, MAX_RANDOM);
        $num2 = random_int(MIN_RANDOM, MAX_RANDOM);
        $dataArr['question'][] = "$num1 $num2";
        $dataArr['correctAnswer'][] = getNod($num1, $num2);
    }
    print_r($dataArr['correctAnswer']);

    startGame($dataArr);
}
