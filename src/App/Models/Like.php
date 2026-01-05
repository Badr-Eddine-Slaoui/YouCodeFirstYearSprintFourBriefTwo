<?php

namespace App\Models;

use Core\Database\Database;
use DateTime;

class Like{
    private int $id;
    private ?int $article_id;
    private ?int $reader_id;
    private DateTime $created_at;

    public function __construct(int $id, string $created_at, ?int $article_id = null, ?int $reader_id = null){
        $this->id = $id;
        $this->article_id = $article_id;
        $this->reader_id = $reader_id;
        $this->created_at = new DateTime($created_at);
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
    
}