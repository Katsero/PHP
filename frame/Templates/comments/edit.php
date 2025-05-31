<?php include __DIR__ . '/../header.php'; ?>

<h2>Редактировать комментарий</h2>

<form method="post">
    <textarea name="text" required><?= htmlspecialchars($comment->getText()) ?></textarea><br>
    <button type="submit">Сохранить</button>
</form>

<hr>

<form action="/PHP/frame/www/articles/<?= $articleId ?>/comments/<?= $comment->getId() ?>/delete" method="post" style="display:inline;">
    <button type="submit">Удалить комментарий</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>