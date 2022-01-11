<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine;

function run()
{
    $task = 'What is the result of the expression?';
    $qa = [];

    $operators = ['+', '-', '*'];

    for ($i = 0; $i < 3; $i++) {
        $first_number = rand(0, 99);
        $operatorIndex = rand(0, 2);

        if ($operatorIndex === 2) {
            $second_number = rand(0, 9);
        } else {
            $second_number = rand(0, 99);
        }

        $question = $first_number . ' ' . $operators[$operatorIndex] . ' ' . $second_number;

        switch ($operatorIndex) {
            case 0:
                $rightAnswer = $first_number + $second_number;
                break;
            case 1:
                $rightAnswer = $first_number - $second_number;
                break;
            case 2:
                $rightAnswer = $first_number * $second_number;
                break;
            default:
                $rightAnswer = $first_number + $second_number;
                break;
        }

        $qa[] = ['question' => $question, 'answer' => (string)$rightAnswer];
    }

    Engine\run($task, $qa);
}
