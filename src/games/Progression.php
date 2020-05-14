<?php

namespace BrainGames\Progression;

use function BrainGames\core\startGame;

use const BrainGames\core\{MAX_RANDOM, MIN_RANDOM};

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
    ################ условие задачи ################
    $rule = "What number is missing in the progression?";
    ################ передаем в движок ################
    $getGameData = function () {
        $starProgression = random_int(MIN_RANDOM, MAX_RANDOM);
        $diff = random_int(3, 10); // шаг прогрессии
        $lengthProgression = 10;
        $progression = getProgression($starProgression, $diff, $lengthProgression);
        $index = rand(0, $lengthProgression - 1);
        //Пишем масив с ответами и заменяем ответ на заглушку
        $answer = $progression[$index];
        $progression[$index] = "..";
        // Собираем строку с вопросом
        $question = implode(" ", $progression);

        return [$question, $answer];
    };
    ################ запуск движка ################
    startGame($getGameData, $rule);
}
