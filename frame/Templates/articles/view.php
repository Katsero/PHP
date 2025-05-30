<!-- Templates/articles/view.php -->

<?php include __DIR__ . '/../header.php'; ?>

<h1><?= htmlspecialchars($article->getName()) ?></h1>
<p><?= nl2br(htmlspecialchars($article->getText())) ?></p>
<p>Автор: <?= htmlspecialchars($article->getAuthor()->getNickname()) ?></p>

<hr>

<h2>Комментарии:</h2>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <?php include __DIR__ . '/../comments/comment.php'; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>Пока нет комментариев.</p>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>