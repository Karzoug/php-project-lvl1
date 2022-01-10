<?php

namespace Brain\Games\Gcd;

use Brain\Games\Engine;

function run()
{
    $userName = Engine\welcome();
    Engine\writeTask('Find the greatest common divisor of given numbers.');

    $succes = true;

    for ($i = 0; $i < 3; $i++) {
        $first_number = rand(0, 99);
        $second_number = rand(0, 99);

        $question = $first_number . ' ' . $second_number;

        // лучше пользоваться готовым, но мы не ищем легких путей
        // $rightAnswer = gmp_strval(gmp_gcd($first_number, $second_number));

        $rightAnswer = get_gcd($first_number, $second_number);

        if (!Engine\qa($question, (string)$rightAnswer)) {
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

// Бинарный алгоритм
function get_gcd(int $m, int $n): int
{
    $gcd = 1;

    do {
        // 1
        if ($m === 0 && $n !== 0) {
            return $gcd * $n;
        }
        if ($n === 0 && $m !== 0) {
            return $gcd * $m;
        }
        if ($m === $n) {
            return $gcd * $m;
        }
        // 2
        if ($m === 1 && $n !== 1) {
            return $gcd;
        }
        if ($n === 1 && $m !== 1) {
            return $gcd;
        }
        // 3
        $isEvenM = ($m % 2) === 0;
        $isEvenN = ($n % 2) === 0;

        if ($isEvenM && $isEvenN) {
            $gcd = $gcd << 1;
            $m = $m >> 1;
            $n = $n >> 1;
        }
        // 4
        if ($isEvenM && !$isEvenN) {
            $m = $m >> 1;
        }
        // 5
        if (!$isEvenM && $isEvenN) {
            $n = $n >> 1;
        }
        // 6 & 7
        if (!$isEvenM && !$isEvenN) {
            if ($n > $m) {
                $n = ($n - $m) >> 1;
            } else {
                $m = ($m - $n) >> 1;
            }
        }
    } while (true);
}
