<?php include __DIR__ . '/../header.php'; ?>

<h2>Добавить новую статью</h2>

<form method="post">
    <label>
        Заголовок:<br>
        <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required><br>
    </label>

    <label>
        Текст статьи:<br>
        <textarea name="text" required><?= htmlspecialchars($_POST['text'] ?? '') ?></textarea><br>
    </label>

    <button type="submit">Добавить статью</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>