<?php

 

namespace MyProject\Controllers;

 

use MyProject\Models\Articles\Article;

use MyProject\View\View;

use MyProject\Models\Users\User;

use MyProject\Models\Comments\Comment;

class ArticlesController

{

    /** @var View */

    private $view;

 

    public function __construct()

    {

        $this->view = new View(__DIR__ . '/../../../templates');

    }

 

    public function view(int $articleId): void

    {

        $article = Article::getById($articleId);

        $comments = Comment::getAllByArticleId($articleId);


 

        if ($article === null) {

            $this->view->renderHtml('errors/404.php', [], 404); //TODO add to index.php

            return;

        }

        $this->view->renderHtml('articles/view.php', [

            'article' => $article,

            'comments' => $comments,

        ]);
        
    }

    public function delete(int $articleId): void
    {
        $article = Article::getById($articleId);

    if ($article === null) {
        header('Location: /PHP/frame/www/');
        exit;
    }

    $article->delete();

    header('Location: /PHP/frame/www/');
    exit;
    }

public function deleteComment(int $articleId, int $commentId): void
{
    $comment = Comment::getById($commentId);

    if ($comment === null) {
        header('Location: /PHP/frame/www/articles/' . $articleId);
        exit;
    }

    $comment->delete();

    header('Location: /PHP/frame/www/articles/' . $articleId);
    exit;
}
    
    public function addComment(int $articleId): void
{
    $article = Article::getById($articleId);

    if ($article === null) {
        header('Location: /');
        exit;
    }

    $text = trim($_POST['text'] ?? '');

    if (!empty($text)) {
        $author = User::getById(1);

        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setArticle($article);
        $comment->setText($text);
        $comment->save();

        $commentId = $comment->getId();
    }

    header('Location: /PHP/frame/www/articles/' . $articleId . '#comment' . $commentId);
    exit;
}


public function editComment(int $articleId, int $commentId): void
{
    $article = Article::getById($articleId);
    $comment = Comment::getById($commentId);

    if ($article === null || $comment === null) {
        header('Location: /');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $text = trim($_POST['text'] ?? '');

        if (!empty($text)) {
            $comment->setText($text);
            $comment->save();

            header('Location: /PHP/frame/www/articles/' . $articleId . '#comment' . $commentId);
            exit;
        }
    }

    $this->view->renderHtml('comments/edit.php', [
        'comment' => $comment,
        'articleId' => $articleId
    ]);
}

public function edit(int $articleId): void
{
    $article = Article::getById($articleId);

    if ($article === null) {
        $this->view->renderHtml('errors/404.php', [], 404);
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $text = trim($_POST['text'] ?? '');

        if (!empty($name) && !empty($text)) {
            $article->setName($name);
            $article->setText($text);
            $article->save();

            header('Location: /PHP/frame/www/articles/' . $articleId);
            exit;
        } else {
            // Можно добавить вывод ошибки (по желанию)
            echo 'Заполните все поля';
            exit;
        }
    }

    // Отображаем форму редактирования
    $this->view->renderHtml('articles/edit.php', [
        'article' => $article
    ]);
}

public function add(): void

{

    $author = User::getById(1);

 

    $article = new Article();

    $article->setAuthor($author);

    $article->setName('Новое название статьи');

    $article->setText('Новый текст статьи');

 

    $article->save();

 

    var_dump($article);

}

}