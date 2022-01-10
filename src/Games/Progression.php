<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine;

function run()
{
    $userName = Engine\welcome();
    Engine\writeTask('What number is missing in the progression?');

    $succes = true;

    for ($i = 0; $i < 3; $i++) {
        $position = rand(0, 9);
        $progressionNumbers = [];
        $progressionNumbers[] = rand(0, 99);
        $step = rand(2, 9);

        for ($j = 1; $j < 10; $j++) {
            $progressionNumbers[$j] = $progressionNumbers[$j - 1] + $step;
        }

        $rightAnswer = $progressionNumbers[$position];
        $progressionNumbers[$position] = "..";
        $question = implode(" ", $progressionNumbers);

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
