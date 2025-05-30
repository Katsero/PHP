<div class="comment">
    <p><?= htmlspecialchars($comment->getText()) ?></p>
    <p><small>Автор: <?= htmlspecialchars($comment->getAuthor()->getNickname()) ?></small></p>
</div>