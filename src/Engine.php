<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}
function qa(string $question, string $rightAnswer): bool
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
function writeTask(string $task)
{
    line($task);
}
function writeTryAgain(string $userName)
{
    line("Let's try again, {$userName}!");
}
function writeCongratulations(string $userName)
{
    line("Congratulations, {$userName}!");
}
