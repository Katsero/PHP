<?php
session_start();

if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
    echo "Добро пожаловать! Это ваш первый заход на страницу.";
} else {
    $seconds_passed = time() - $_SESSION['start_time'];
    echo "Вы зашли на сайт $seconds_passed секунд(ы) назад.";
}
?>