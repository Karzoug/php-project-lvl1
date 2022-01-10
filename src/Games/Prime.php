<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine;

function run()
{
    $userName = Engine\welcome();
    Engine\writeTask('Answer "yes" if given number is prime. Otherwise answer "no".');

    $succes = true;

    for ($i = 0; $i < 3; $i++) {
        $number = rand(0, 100);

        // случай четного числа слишком уж банальный
        if ($number % 2 === 0) {
            $number++;
        }

        $question = $number;
        $rightAnswer = isPrime($number) ? "yes" : "no";

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

// Простой перебор делителей для определения простоты числа
function isPrime(int $number): bool
{
    if ($number === 2) {
        return true;
    }

    if ($number === 1) {
        return false;
    }

    if ($number % 2 === 0) {
        return false;
    }

    if ($number >= 9) {
        $arr = [2, ...range(3, sqrt($number), 2)];
    } else {
        $arr = [2, 3];
    }

    foreach ($arr as $value) {
        if ($number % $value === 0) {
            return false;
        }
    }

    return true;
}
