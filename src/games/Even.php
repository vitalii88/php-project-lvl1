<?php

namespace BrainGames\Even;

use function BrainGames\core\{startGame, getRandom};

use const BrainGames\core\CORRECT_STRIKE as CORRECT_STRIKE;

// // Генерим случайное число
// function getRandom()
// {
//     return random_int(1, 100);
// }

function startEvenGame()
{
    // Правила
    $rule = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

    //--------!!! Через функции (генерит в ядро 1 раз)-------


    // $questin = getRandom();
    
    //-------- Попытка создать задания в массив -------------
    
    // Пишем в массив вопросы
    $questionArr = [];
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $questionArr[] = getRandom();
    }

    //создаем массив с ответами
    $correctAnswerArr = [];
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        if ($questionArr[$i] % 2 == 0) {
            $correctAnswerArr[] = "yes";
        } else {
            $correctAnswerArr[] = "no";
        }
    }

    //---------------------
    
    
    //---------------------
    
    // // Правельный ответ
    // $correctAnswer = function ($question)
    //     {
    //     if ($question % 2 == 0) {
    //         $answer = 'yes';
    //         return $answer;
    //     } else {
    //         $answer = 'no';
    //         return $answer;
    //     }
    // };

    startGame($rule, $questionArr, $correctAnswerArr);
}
