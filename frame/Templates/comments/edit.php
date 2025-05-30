<?php include __DIR__ . '/../header.php'; ?>

<h2>Редактировать комментарий</h2>

<form method="post">
    <textarea name="text" required><?= htmlspecialchars($comment->getText()) ?></textarea><br>
    <button type="submit">Сохранить</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>