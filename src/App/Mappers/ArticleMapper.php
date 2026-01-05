<?php

namespace App\Mappers;

use App\Models\Article;
use App\Models\Author;
use App\ViewModels\Article as ViewModelsArticle;

class ArticleMapper{
    private static ?ArticleMapper $instance = null;

    private function __construct() {}

    public static function getInstance(): ArticleMapper{
        if(self::$instance === null){
            self::$instance = new ArticleMapper();
        }

        return self::$instance;
    }

    public function map(array $row, array $categories): Article
    {
        return new Article(
            $row['id'],
            $row['title'],
            $row['body'],
            $row['cover'],
            $row['author_id'],
            $categories,
            $row['created_at'],
            $row['likes_count'],
            $row['comments_count']
        );
    }

    public function toArticleView(array $row, array $categories, array $comments, Author $author): ViewModelsArticle{
        return new ViewModelsArticle(
            $row['id'],
            $row['title'],
            $row['body'],
            $row['cover'],
            $row['author_id'],
            $categories,
            $row['created_at'],
            $comments,
            $author,
            $row['is_liked_by_current_user'],
            $row['likes_count'],
            $row['comments_count']
        );
    }
}