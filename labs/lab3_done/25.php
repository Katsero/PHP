<?php
$files = ['1.txt', '2.txt', '3.txt'];

if (isset($_POST['delete'])) {
    foreach ($files as $file) {
        if (file_exists($file)) {
            unlink($file);
            echo "Файл $file удален.<br>";
        } else {
            echo "Файл $file не найден.<br>";
        }
    }
}


if (isset($_POST['restore'])) {
    foreach ($files as $file) {
        $handle = fopen($file, 'w');  
        fwrite($handle, "Это содержимое файла $file"); 
        fclose($handle);
        echo "Файл $file создан.<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Удаление и восстановление файлов</title>
</head>
<body>

<h2>Управление файлами</h2>

<form method="post">
    <button type="submit" name="delete">Удалить файлы</button>
    <button type="submit" name="restore">Восстановить файлы</button>
</form>

</body>
</html>