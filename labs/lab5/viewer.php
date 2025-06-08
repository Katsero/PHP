<?php
function showContacts($sort = 'default', $page = 1) {
    global $pdo;

    $limit = 10;
    $offset = ($page - 1) * $limit;

    switch ($sort) {
        case 'surname':
            $order = 'ORDER BY surname ASC, name ASC';
            break;
        case 'birthdate':
            $order = 'ORDER BY birthdate ASC';
            break;
        default:
            $order = 'ORDER BY id ASC';
    }

    $stmt = $pdo->query("SELECT COUNT(*) FROM contacts");
    $total = $stmt->fetchColumn();
    $pages = ceil($total / $limit);

    $stmt = $pdo->query("SELECT * FROM contacts $order LIMIT $limit OFFSET $offset");

    $html = '<table border="1" cellpadding="5">';
    $html .= '<tr><th>ФИО</th><th>Дата рождения</th><th>Телефон</th><th>Email</th></tr>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $fio = "$row[surname] $row[name] $row[patronymic]";
        $html .= "<tr><td>$fio</td><td>{$row['birthdate']}</td><td>{$row['phone']}</td><td>{$row['email']}</td></tr>";
    }
    $html .= '</table>';

    $html .= '<div style="margin-top: 1em;">';
    for ($i = 1; $i <= $pages; $i++) {
        $active = ($i == $page) ? 'style="border: 2px solid #000"' : '';
        $html .= "<a href='?page=view&sort=$sort&pagenum=$i' $active>$i</a> ";
    }
    $html .= '</div>';

    return $html;
}
?>