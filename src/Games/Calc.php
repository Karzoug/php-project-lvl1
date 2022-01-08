<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine;

function calc()
{
    $userName = Engine\welcome();
    Engine\writeTask('What is the result of the expression?');

    $operators = ['+', '-', '*'];

    $succes = true;

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
        }

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
