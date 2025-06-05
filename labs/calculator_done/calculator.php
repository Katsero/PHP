<?php

$expression = $_POST['expression'] ?? '';

if (empty($expression)) {
    echo "Ошибка: Пустое выражение";
    exit;
}

$expression = str_replace(' ', '', $expression);

try {
    $tokens = tokenize($expression);
    $result = parseExpression($tokens);

    if (!is_numeric($result)) {
        throw new Exception("Неверное выражение");
    }

    echo $result;

} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}

function tokenize($expr) {
    $tokens = [];
    $i = 0;
    $len = strlen($expr);

    while ($i < $len) {
        $char = $expr[$i];

        if (in_array($char, ['+', '-', '*', '/', '(', ')', '.'])) {
            $tokens[] = $char;
            $i++;
        } elseif (is_numeric($char)) {
            $num = $char;
            $i++;

            while ($i < $len && (is_numeric($expr[$i]) || $expr[$i] === '.')) {
                $num .= $expr[$i];
                $i++;
            }

            $tokens[] = $num;
        } else {
            throw new Exception("Неизвестный символ: $char");
        }
    }

    return $tokens;
}

function parseExpression(&$tokens) {
    $result = parseTerm($tokens);

    while (!empty($tokens) && in_array($tokens[0], ['+', '-'])) {
        $op = array_shift($tokens);
        $right = parseTerm($tokens);
        if ($op === '+') $result += $right;
        else $result -= $right;
    }

    return $result;
}

function parseTerm(&$tokens) {
    $result = parseFactor($tokens);

    while (!empty($tokens) && in_array($tokens[0], ['*', '/'])) {
        $op = array_shift($tokens);
        $right = parseFactor($tokens);

        if ($op === '*') $result *= $right;
        else {
            if ($right == 0) {
                throw new Exception("Деление на ноль недопустимо");
            }
            $result /= $right;
        }
    }

    return $result;
}

function parseFactor(&$tokens) {
    $token = array_shift($tokens);

    if ($token === '(') {
        $result = parseExpression($tokens);
        if (array_shift($tokens) !== ')') {
            throw new Exception("Отсутствует закрывающая скобка");
        }
        return $result;
    } elseif (is_numeric($token)) {
        return floatval($token);
    } else {
        throw new Exception("Ожидалось число или '('");
    }
}