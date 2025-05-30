<div id="comment<?= $comment->getId() ?>" class="comment">
    <p><?= htmlspecialchars($comment->getText()) ?></p>
    <p><small>Автор: <?= htmlspecialchars($comment->getAuthor()->getNickname()) ?></small></p>
    <a href="/PHP/frame/www/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>/edit">Редактировать</a>
</div>