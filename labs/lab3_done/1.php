<?php
$modifiedText = '';
$userText = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userText = $_POST['user_text'];
    $words = preg_split('/\s+/', $userText, -1, PREG_SPLIT_NO_EMPTY);

    function processWords(&$words) {
        foreach ($words as $index => $word) {
            if (($index + 1) % 2 === 0) {
                $words[$index] = strtoupper($word);
            }
        }
    }

    processWords($words);
    $modifiedText = implode(' ', $words);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработка текста</title>
</head>
<body>
    <h2>Введите текст:</h2>
    <form method="post" action="">
        <textarea name="user_text" rows="5" cols="40"><?= htmlspecialchars($userText) ?></textarea><br>
        <input type="submit" value="Обработать">
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h3>Исходный текст:</h3>
        <p><?= htmlspecialchars($userText) ?></p>

        <h3>Обработанный текст:</h3>
        <p><?= htmlspecialchars($modifiedText) ?></p>
    <?php endif; ?>
</body>
</html>