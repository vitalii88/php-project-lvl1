<?php

namespace BrainGames\Even;

function startGame()
{
    # Счетчик побед
    $correctStrike = 3;
    $randomNumb = 0; # буду генерить через random_int(1, 999);
    $correctAnswer = "Correct!";
    $wrongAnswerYes = "is wrong answer :(. Correct answer was 'no'";
    $wrongAnswerNO = "is wrong answer :(. Correct answer was 'yes'";

    echo "Welcome to Brain Games", PHP_EOL;
    echo "Answer \"yes\" if the number is even, otherwise answer \"no\".", PHP_EOL;

    echo "May I have your name? ", PHP_EOL;
    $name = trim(fgets(STDIN));
    echo "Hello, {$name}!", PHP_EOL;

    while ($correctStrike > 0) {
        $randomNumb = random_int(1, 999);
        echo "Question: {$randomNumb}", PHP_EOL;
        echo "Your answer: ";
        $playerAnswer = trim(fgets(STDIN));

        switch ($playerAnswer) {
            case 'yes':
                if ($randomNumb % 2 == 0) {
                    echo "{$correctAnswer}", PHP_EOL;
                    $correctStrike--;
                } else {
                    echo "{$playerAnswer} {$wrongAnswerYes}", PHP_EOL;
                    $correctStrike = -1;
                }
                break;
            
            case 'no':
                if ($randomNumb % 2 == 1) {
                    echo "{$correctAnswer}", PHP_EOL;
                    $correctStrike--;
                } else {
                    echo "{$playerAnswer} {$wrongAnswerNO}", PHP_EOL;
                    $correctStrike = -1;
                }
                break;
            
            default:
                if ($randomNumb % 2 == 0) {
                    echo "{$playerAnswer} {$wrongAnswerNO}", PHP_EOL;
                    $correctStrike = -1;
                } else {
                    echo "{$playerAnswer} {$wrongAnswerYes}", PHP_EOL;
                    $correctStrike = -1;
                }
                break;
        }
        # END swith
    }
    # END while

    if ($correctStrike == 0) {
        echo "Congratulations {$name}", PHP_EOL;
    } else {
        echo "Let's try again, {$name}!", PHP_EOL;
    }
}
