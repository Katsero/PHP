<?php include __DIR__ . '/../header.php'; ?>

<a href="/PHP/frame/www/articles/add">
    Добавить новую статью
</a>


<?php foreach ($articles as $article): ?>

    <h2>        
        <a href="/PHP/frame/www/articles/<?= $article->getId() ?>">
            <?= htmlspecialchars($article->getName()) ?>
        </a>
    </h2>

    <p><?= $article->getText() ?></p>

    <hr>

<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>