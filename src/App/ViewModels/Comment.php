<?php

namespace App\ViewModels;

use App\Models\Article;
use App\Models\Reader;
use DateTime;

class Comment{
    private int $id;
    private int $article_id;
    private int $reader_id;
    private string $body;
    private int $likes_count;
    private DateTime $created_at;
    private Reader $reader;
    private Article $article;
    private bool $is_liked_by_current_user;
    private bool $is_reported_by_current_user;


    public function __construct(int $id, int $article_id, int $reader_id, string $body, string $created_at, Reader $reader, Article $article, bool $is_liked_by_current_user = false, bool $is_reported_by_current_user = false, int $likes_count = 0){
        $this->id = $id;
        $this->article_id = $article_id;
        $this->reader_id = $reader_id;
        $this->body = $body;
        $this->created_at = new DateTime($created_at);
        $this->likes_count = $likes_count;
        $this->reader = $reader;
        $this->article = $article;
        $this->is_liked_by_current_user = $is_liked_by_current_user;
        $this->is_reported_by_current_user = $is_reported_by_current_user;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
}