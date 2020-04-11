<?php

namespace BrainGames\Progression;

use function BrainGames\core\startGame;

use const BrainGames\core\{CORRECT_STRIKE, MAX_RANDOM, MIN_RANDOM};

############### прогрессия ################
function getProgression($starProgression, $diff, $lengthProgression)
{
    $progression = [];
    for ($i = 0; $i < $lengthProgression; $i++) {
        $progression[] = $starProgression + $diff * $i;
    }
    return $progression;
}
################  Логика ################
function startProgressionGame()
{
    ################ объявим рабочие массивы ################
    $dataArr = [
        'rule' => [],
        'question' => [],
        'correctAnswer' => [],
    ];
    ################ аргументы для генарации прогрессии ################
    $starProgression = random_int(MIN_RANDOM, MAX_RANDOM);
    $diff = random_int(3, 10); // шаг прогрессии
    $lengthProgression = 10;
    ################ условие задачи ################
    $dataArr['rule'] = "What number is missing in the progression?";
    ################  Генерим массивы с вопросами и ответами   ################
    for ($i = 0; $i < CORRECT_STRIKE; $i++) {
        $progressionArr = getProgression($starProgression, $diff, $lengthProgression);
        $randomArrIndex = array_rand($progressionArr);
        $index = $randomArrIndex;
        //Пишем масив с ответами и заменяем ответ на заглушку
        $dataArr['correctAnswer'][] = $progressionArr[$index];
        $progressionArr[$index] = "..";
        // Собираем строку с вопросом
        $tempString = "";
        foreach ($progressionArr as $key => $value) {
            $tempString = $tempString . $value . " ";
        }
        // Пишем вопрос в массив
        $dataArr['question'][] = $tempString;
    }
    ################ запуск движка ################
    startGame($dataArr);
}
