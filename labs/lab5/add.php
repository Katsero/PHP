<?php
function showAddForm() {
    global $pdo;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("INSERT INTO contacts (surname, name, patronymic, gender, birthdate, phone, address, email, comment)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([
            $_POST['surname'],
            $_POST['name'],
            $_POST['patronymic'],
            $_POST['gender'],
            $_POST['birthdate'],
            $_POST['phone'],
            $_POST['address'],
            $_POST['email'],
            $_POST['comment']
        ]);

        echo $result ? '<p style="color:green;">Запись добавлена</p>' : '<p style="color:red;">Ошибка: запись не добавлена</p>';
    }

    return '
    <form method="post">
        <label>Фамилия: <input type="text" name="surname"></label><br>
        <label>Имя: <input type="text" name="name"></label><br>
        <label>Отчество: <input type="text" name="patronymic"></label><br>
        Пол: 
        <label><input type="radio" name="gender" value="муж" checked> Муж</label>
        <label><input type="radio" name="gender" value="жен"> Жен</label><br>
        <label>Дата рождения: <input type="date" name="birthdate"></label><br>
        <label>Телефон: <input type="text" name="phone"></label><br>
        <label>Адрес: <input type="text" name="address"></label><br>
        <label>Email: <input type="email" name="email"></label><br>
        <label>Комментарий: <textarea name="comment"></textarea></label><br>
        <button type="submit">Добавить</button>
    </form>';
}
?>