<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function run(string $task, array $qa)
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line($task);

    $succes = true;
    foreach ($qa as $value) {
        if (!step($value['question'], $value['answer'])) {
            $succes = false;
            break;
        }
    }

    if ($succes) {
        line("Congratulations, {$userName}!");
    } else {
        line("Let's try again, {$userName}!");
    }
}
function step(string $question, string $rightAnswer): bool
{
    line("Question: {$question}");
    $userAnswer = prompt('Your answer');

    if ($userAnswer === $rightAnswer) {
        line('Correct!');

        return true;
    } else {
        line("'{$userAnswer}'  is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
    }

    return false;
}
