<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine;

function run()
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    for ($i = 0; $i < 3; $i++) {
        $number = rand(0, 100);

        // случай четного числа слишком уж банальный
        if ($number % 2 === 0) {
            $number++;
        }

        $question = $number;
        $rightAnswer = isPrime($number) ? "yes" : "no";

        $qa[] = ['question' => (string)$question, 'answer' => $rightAnswer];
    }

    Engine\run($task, $qa);
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

    $arr = [];
    $curr = 3;
    $up_range = sqrt($number);
    while ($curr <= $up_range) {
        $arr[] = $curr;
        $curr += 2;
    }

    foreach ($arr as $value) {
        if ($number % $value === 0) {
            return false;
        }
    }

    return true;
}
