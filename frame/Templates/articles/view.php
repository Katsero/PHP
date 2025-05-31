<?php include __DIR__ . '/../header.php'; ?>

<h1><?= htmlspecialchars($article->getName()) ?></h1>
<p><?= nl2br(htmlspecialchars($article->getText())) ?></p>
<p>Автор: <?= htmlspecialchars($article->getAuthor()->getNickname()) ?></p>

<a href="/PHP/frame/www/articles/<?= $article->getId() ?>/edit">Редактировать статью</a>
<hr>

<h2>Комментарии:</h2>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <?php include __DIR__ . '/../comments/comment.php'; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>Пока нет комментариев.</p>
<?php endif; ?>

<hr>

<h2>Оставить комментарий</h2>

<form method="post" action="/PHP/frame/www/articles/<?= $article->getId() ?>/comments">
    <textarea name="text" placeholder="Ваш комментарий" required></textarea><br>
    <button type="submit">Отправить</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>