<?php

namespace BrainGames\Cli;

function run()
{
    echo "Welcome to the Brain Games!", PHP_EOL;
    echo "May I have your name? ";
    $name = trim(fgets(STDIN));
    echo "Hello, {$name}!", PHP_EOL;
}
