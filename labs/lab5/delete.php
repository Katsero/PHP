<?php
function showDeletePage() {
    global $pdo;

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $pdo->prepare("SELECT surname FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($contact) {
            $pdo->prepare("DELETE FROM contacts WHERE id = ?")->execute([$id]);
            echo "<p style='color:green;'>Запись с фамилией {$contact['surname']} удалена</p>";
        } else {
            echo "<p style='color:red;'>Запись не найдена</p>";
        }
    }

    $stmt = $pdo->query("SELECT id, surname, name FROM contacts ORDER BY surname");
    $output = '<ul>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= "<li><a href='?page=delete&id={$row['id']}'>{$row['surname']} {$row['name'][0]}.</a></li>";
    }
    $output .= '</ul>';
    return $output;
}
?>