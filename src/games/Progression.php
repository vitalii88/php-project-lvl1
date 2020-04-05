<?php

namespace BrainGames\Progression;

use function BrainGames\core\startGame as startGame;
use function BrainGames\Even\getRandom as getRandom;

use const BrainGames\core\CORRECT_STRIKE as CORRECT_STRIKE;

################ прогрессия ################
function getProgression()
{
    $progression = [];
    $starProgression = getRandom();
    $d = random_int(3, 10); // шаг прогрессии
    //echo "d: $d\n";
    for ($i = 0; $i < 10; $i++) {
        // шаг прогресии делаем не слишком большим
        //echo "start: $starProgression\n";
        $progression[] = $starProgression;
        $starProgression = $starProgression + $d;
    }
    //print_r($progression);
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
        // print_r("Получили массив с прогрессией:\n");
        // print_r($progressionArr);
        
        $randomArrIndex = array_rand($progressionArr);
        $index = $randomArrIndex;
        // echo "Рандомный индекс: $randomArrIndex\n";
        
        //Пишем масив с ответами и заменяем ответ на заглушку
        $correctAnswerArr[] = $progressionArr[$index];
        $progressionArr[$index] = "..";
        // print_r($progressionArr);
        // print_r($correctAnswerArr);
        
        // Собираем строку с вопросом
        $tempString = "";
        foreach ($progressionArr as $key => $value) {
            $tempString = $tempString . $value . " ";
        }
        // Пишем вопрос в массив
        $questionArr[] = $tempString;
    }
    // echo "Вопросы\n";
    // print_r($questionArr);
    
    
    // echo "ответы\n";
    // print_r($correctAnswerArr);
    
    
    ################ запуск движка ################
    startGame($rule, $questionArr, $correctAnswerArr);
    
}

// !!! РАБОТАЕТ !!! собираем один индекс массива из длинной строки
// $arr1 = [];
// $str = "Hello Frie\$nd, sadad sdas; \"sd \"as";
// $str2 = "Jfd  hsgdkhj jhdsf \$nd, sadad sdas; \"sd \"as";
// $arr1[] = str_split($str, strlen($str));
// $arr1[] = str_split($str2, strlen($str2));
// // $arr2 = array_values($arr1);

// из многомерного в одномерный
// $arrOut = call_user_func_array('array_merge', $arr1);
// print_r($arr1);
// print_r($arrOut);

//////////////////////////

// $str2 = "Hello Frie\$nd, sadad sdas; \"sd \"as";
// $arr1 = str_split($str, strlen($str));
// print_r($arr1);
