<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовки сервера</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo"><img src="logo.png" alt="Логотип МосПолитеха"></div>
        <h1>Задание: Feedback form</h1>
    </header>

    <main>
        <h2>Результат работы функции get_headers:</h2>
        <textarea readonly rows="20" cols="80">
<?php
// Получаем заголовки текущего запроса
$headers = getallheaders();
foreach ($headers as $name => $value) {
    echo "$name: $value\n";
}
?>
        </textarea>
    </main>

    <footer>
        <p>Задание для самостоятельной работы</p>
    </footer>
</body>
</html>