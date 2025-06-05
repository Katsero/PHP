<?php

$filename = 'test.txt';

if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    print_r($lines);
} else {
    echo "Файл $filename не найден.";
}