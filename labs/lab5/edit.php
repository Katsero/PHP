<?php
function showEditForm() {
    global $pdo;

    $id = isset($_GET['id']) ? intval($_GET['id']) : 1;

    $stmt = $pdo->query("SELECT id, CONCAT(surname, ' ', name) AS fio FROM contacts ORDER BY surname, name");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = '<ul>';
    foreach ($contacts as $contact) {
        $selected = ($contact['id'] == $id) ? 'style="font-weight:bold;"' : '';
        $output .= "<li><a href='?page=edit&id={$contact['id']}' $selected>{$contact['fio']}</a></li>";
    }
    $output .= '</ul>';

    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        return '<p>Запись не найдена</p>';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("UPDATE contacts SET surname=?, name=?, patronymic=?, gender=?, birthdate=?, phone=?, address=?, email=?, comment=? WHERE id=?");
        $stmt->execute([
            $_POST['surname'], $_POST['name'], $_POST['patronymic'],
            $_POST['gender'], $_POST['birthdate'], $_POST['phone'],
            $_POST['address'], $_POST['email'], $_POST['comment'], $id
        ]);
        $output .= '<p style="color:green;">Запись обновлена</p>';
    }

    $output .= '
    <form method="post">
        <label>Фамилия: <input type="text" name="surname" value="'.$contact['surname'].'"></label><br>
        <label>Имя: <input type="text" name="name" value="'.$contact['name'].'"></label><br>
        <label>Отчество: <input type="text" name="patronymic" value="'.$contact['patronymic'].'"></label><br>
        Пол: 
        <label><input type="radio" name="gender" value="муж" '.($contact['gender']=='муж'?'checked':'').'> Муж</label>
        <label><input type="radio" name="gender" value="жен" '.($contact['gender']=='жен'?'checked':'').'> Жен</label><br>
        <label>Дата рождения: <input type="date" name="birthdate" value="'.$contact['birthdate'].'"></label><br>
        <label>Телефон: <input type="text" name="phone" value="'.$contact['phone'].'"></label><br>
        <label>Адрес: <input type="text" name="address" value="'.$contact['address'].'"></label><br>
        <label>Email: <input type="email" name="email" value="'.$contact['email'].'"></label><br>
        <label>Комментарий: <textarea name="comment">'.$contact['comment'].'</textarea></label><br>
        <button type="submit">Сохранить</button>
    </form>';

    return $output;
}
?>