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

    /** @var Article $article */

    $article = Article::getById($articleId);

 

    if ($article === null) {

        $this->view->renderHtml('errors/404.php', [], 404);

        return;

    }

 

    $article->setName('Новое название статьи');

    $article->setText('Новый текст статьи');

 

    $article->save();

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