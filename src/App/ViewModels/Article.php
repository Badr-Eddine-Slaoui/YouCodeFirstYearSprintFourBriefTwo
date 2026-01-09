<?php

namespace App\ViewModels;

use App\Models\Author;
use DateTime;

class Article {
    private int $id;
    private string $title;
    private string $content;
    private string $cover;
    private int $author_id;
    private array $categories;
    private DateTime $created_at;
    private int $likes_count;
    private int $comments_count;
    private array $comments;
    private Author $author;
    private bool $is_liked_by_current_user;
    private bool $is_reported_by_current_user;


    public function __construct(int $id, string $title, string $content, string $cover, int $author_id, array $categories, string $created_at, array $comments, Author $author, bool $is_liked_by_current_user = false, bool $is_reported_by_current_user = false, int $likes_count = 0, int $comments_count = 0){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->cover = $cover;
        $this->author_id = $author_id;
        $this->categories = $categories;
        $this->created_at = new DateTime($created_at);
        $this->comments = $comments;
        $this->author = $author;
        $this->is_liked_by_current_user = $is_liked_by_current_user;
        $this->is_reported_by_current_user = $is_reported_by_current_user;
        $this->likes_count = $likes_count;
        $this->comments_count = $comments_count;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
}