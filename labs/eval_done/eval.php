<?php

function evaluateTrigonometricFunction($func, $arg) {
    switch (strtolower($func)) {
        case 'sin':
            return sin($arg);
        case 'cos':
            return cos($arg);
        case 'tan':
            return tan($arg);
        case 'cot':
            $tanVal = tan($arg);
            if ($tanVal == 0 || abs($tanVal) < 1e-10) {
                throw new Exception("Недопустимое значение для cot($arg)");
            }
            return 1 / $tanVal;
        default:
            throw new Exception("Неизвестная функция: $func");
    }
}