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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $text = trim($_POST['text']);

        if (!empty($text)) {

            $author = User::getById(1);

            $comment = new Comment();
            $comment->setAuthor($author);
            $comment->setArticle($article);
            $comment->setText($text);
            $comment->save();

            header('Location: ' . $this->getCurrentUrl());
            exit;
        }
    }

        $this->view->renderHtml('articles/view.php', [

            'article' => $article,

            'comments' => $comments,

        ]);

    }

private function getCurrentUrl(): string
{
    $scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];

    return $scheme . '://' . $host . $uri;
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