<?php

namespace App\ViewModels;

use App\Models\Article;
use App\Models\Reader;
use DateTime;

class Like{
    private int $id;
    private int $article_id;
    private int $reader_id;
    private string $body;
    private DateTime $created_at;
    private Reader $reader;
    private Article $article;


    public function __construct(int $id, int $article_id, int $reader_id, string $created_at, Reader $reader, Article $article){
        $this->id = $id;
        $this->article_id = $article_id;
        $this->reader_id = $reader_id;
        $this->created_at = new DateTime($created_at);
        $this->reader = $reader;
        $this->article = $article;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
}