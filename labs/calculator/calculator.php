<?php
$expression = $_POST['expression'] ?? '';

if (empty($expression)) {
    echo "Ошибка: Пустое выражение";
    exit;
}

try {
    $result = eval("return $expression;");

    if (!is_numeric($result)) {
        throw new Exception("Неверное выражение");
    }

    echo $result;
} catch (DivisionByZeroError $e) {
    echo "Ошибка: Деление на ноль недопустимо";
} catch (ParseError $e) {
    echo "Ошибка: Некорректное выражение";
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>