<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header >
        <img src="public/logo.svg" alt="Main logo" style='height:50px; background-color:black; padding: 5px'>
        <h1  style='text-align: center'>
            2.1.Домашняя работа: Hello, World! Время выполнения - 3 часа
        </h1>
    </header>
    <main>
        <?php
            date_default_timezone_set('Europe/Moscow');
            $output = 'Hello Mospolytech!';
            $time = date('H:i:s', time());
            echo($output . ' It is ' . $time);
        ?>
    </main>
</body>
</html>