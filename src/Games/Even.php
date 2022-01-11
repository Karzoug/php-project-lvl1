<?php

namespace Brain\Games\Even;

use Brain\Games\Engine;

function run()
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';
    $qa = [];

    for ($i = 0; $i < 3; $i++) {
        $number = rand(0, 99);

        $question = $number;
        $rightAnswer = ($number % 2 === 0) ? "yes" : "no";

        $qa[] = ['question' => (string)$question, 'answer' => $rightAnswer];
    }

    Engine\run($task, $qa);
}
