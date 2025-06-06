<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Формы с сессией</title>
</head>
<body>

<h2>Введите ваш email</h2>
<form method="post" action="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit" name="save_email">Сохранить email</button>
</form>

<?php
if (isset($_POST['save_email'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email) {
        $_SESSION['user_email'] = $email;
        echo "<p>Email сохранён: $email</p>";
    } else {
        echo "<p>Некорректный email.</p>";
    }
}

if (isset($_SESSION['user_email'])) {
    $saved_email = htmlspecialchars($_SESSION['user_email']);
    echo "
    <h2>Регистрационная форма</h2>
    <form method=\"post\" action=\"\">
        <label for=\"name\">Имя:</label><br>
        <input type=\"text\" id=\"name\" name=\"name\" required><br><br>

        <label for=\"surname\">Фамилия:</label><br>
        <input type=\"text\" id=\"surname\" name=\"surname\" required><br><br>

        <label for=\"password\">Пароль:</label><br>
        <input type=\"password\" id=\"password\" name=\"password\" required><br><br>

        <label for=\"email_form2\">Email:</label><br>
        <input type=\"email\" id=\"email_form2\" name=\"email_form2\" value=\"$saved_email\" readonly><br><br>

        <button type=\"submit\">Отправить</button>
    </form>
    ";
}
?>

</body>
</html>