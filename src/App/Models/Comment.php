<?php

namespace App\Models;

use DateTime;

class Comment{
    private int $id;
    private int $article_id;
    private int $reader_id;
    private string $body;
    private int $likes_count;
    private DateTime $created_at;

    public function __construct(int $id, int $article_id, int $reader_id, string $body, string $created_at, int $likes_count = 0){
        $this->id = $id;
        $this->article_id = $article_id;
        $this->reader_id = $reader_id;
        $this->body = $body;
        $this->created_at = new DateTime($created_at);
        $this->likes_count = $likes_count;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
    
}