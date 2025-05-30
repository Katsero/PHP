<?php

 

namespace MyProject\Models\Comments;

 

use MyProject\Models\ActiveRecordEntity;
 use MyProject\Models\Users\User;
 use MyProject\Models\Articles\Article;

 

class Comment extends ActiveRecordEntity

{

   

    protected $authorId;

 

   

    protected $articleId;

 

   

    protected $text;

 

   

    protected $createdAt;

 

    public function getAuthor(): User

    {

        return User::getById($this->authorId);

    }

 

    public function getArticle(): Article

    {

        return Article::getById($this->articleId);

    }

 

    public function getText(): string

    {

        return $this->text;

    }

 

    protected static function getTableName(): string

    {

        return 'comments';

    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function setArticle(Article $article): void
    {
        $this->articleId = $article->getId();
    }
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public static function getAllByArticleId(int $articleId): array
    {
        return static::findAllWhere('article_id', $articleId);
    }
}