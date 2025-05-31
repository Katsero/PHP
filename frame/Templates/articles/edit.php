<?php include __DIR__ . '/../header.php'; ?>

<h2>Редактировать статью</h2>

<form method="post">
    <label>
        Заголовок:<br>
        <input type="text" name="name" value="<?= htmlspecialchars($article->getName()) ?>" required><br>
    </label>

    <label>
        Текст:<br>
        <textarea name="text" required><?= htmlspecialchars($article->getText()) ?></textarea><br>
    </label>

    <button type="submit">Сохранить</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>