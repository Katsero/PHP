<?php

$fileInDir1 = 'dir1/test.txt';
$fileInDir2 = 'dir2/test.txt';

if (file_exists($fileInDir1)) {
    if (rename($fileInDir1, $fileInDir2)) {
        echo "Файл перемещён в dir2.";
    } else {
        echo "Ошибка при перемещении в dir2.";
    }
} elseif (file_exists($fileInDir2)) {
    if (rename($fileInDir2, $fileInDir1)) {
        echo "Файл перемещён в dir1.";
    } else {
        echo "Ошибка при перемещении в dir1.";
    }
} else {
    echo "Файл test.txt не найден ни в одной из директорий.";
}