<?php

namespace Brain\Games\Progression;

use Brain\Games\Engine;

function run()
{
    $task = 'What number is missing in the progression?';
    $qa = [];

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

        $qa[] = ['question' => $question, 'answer' => (string)$rightAnswer];
    }

    Engine\run($task, $qa);
}
