<?php
$filename = 'image.png';

if (file_exists($filename)) {
    $sizeInBytes = filesize($filename);

    $sizeInMB = round($sizeInBytes / (1024 * 1024), 2);

    echo "Размер файла '$filename' составляет $sizeInMB МБ.";
} else {
    echo "Файл '$filename' не найден.";
}
?>