<?php

namespace Brain\Games\Even;

use Brain\Games\Engine;

function run()
{
    $userName = Engine\welcome();
    Engine\writeTask('Answer "yes" if the number is even, otherwise answer "no".');

    $succes = true;

    for ($i = 0; $i < 3; $i++) {
        $number = rand(0, 99);

        $question = $number;
        $rightAnswer = ($number % 2 === 0) ? "yes" : "no";

        if (!Engine\qa($question, $rightAnswer)) {
            $succes = false;
            break;
        }
    }

    if ($succes) {
        Engine\writeCongratulations($userName);
    } else {
        Engine\writeTryAgain($userName);
    }
}
