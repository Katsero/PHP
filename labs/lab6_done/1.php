<?php
session_start();

if (!isset($_SESSION['text'])) {
    $_SESSION['text'] = 'test';
    echo "Значение 'test' записано в сессию.";
} else {
    echo "Содержимое сессии: <pre>";
    print_r($_SESSION);
    echo "</pre>";
}
?>