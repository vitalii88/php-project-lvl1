<?php

namespace BrainGames\Progression;

use function BrainGames\core\{startGame, getRandom};

// use function BrainGames\Even\getRandom as getRandom;

use const BrainGames\core\CORRECT_STRIKE as CORRECT_STRIKE;

################ прогрессия ################
function getProgression()
{
    $progression = [];
    $starProgression = getRandom();
    $d = random_int(3, 10); // шаг прогрессии
    for ($i = 0; $i < 10; $i++) {
        // шаг прогресии делаем не слишком большим
        $progression[] = $starProgression;
        $starProgression = $starProgression + $d;
    }
    return $progression;
}
################  Логика ################
function startProgressionGame()
{
    ################ условие задачи ################
    $rule = "What number is missing in the progression?";
    ################ объявим рабочие массивы ################
    $questionArr = [];
    $correctAnswerArr = [];
    ################  Генерим массивы с вопросами и ответами   ################
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $progressionArr = getProgression();
        $randomArrIndex = array_rand($progressionArr);
        $index = $randomArrIndex;
        //Пишем масив с ответами и заменяем ответ на заглушку
        $correctAnswerArr[] = $progressionArr[$index];
        $progressionArr[$index] = "..";
        // Собираем строку с вопросом
        $tempString = "";
        foreach ($progressionArr as $key => $value) {
            $tempString = $tempString . $value . " ";
        }
        // Пишем вопрос в массив
        $questionArr[] = $tempString;
    }
    ################ запуск движка ################
    startGame($rule, $questionArr, $correctAnswerArr);
}
