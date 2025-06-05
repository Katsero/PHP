<?php

function solve($equation) {
    $equation = str_replace(' ', '', $equation);

    $reg = '/^(\d+)\/x=(\d+)$/i';

    if (!preg_match($reg, $equation, $matches)) {
        return 'Неверный вид уравнения';
    } 

    else if ($matches[2] == 0) {
        return 'Не существует решений';
    }

    else {
        return "x = ".($matches[1]/$matches[2]);
    }
}

echo (solve('6/X=0')); //change equation to any you want