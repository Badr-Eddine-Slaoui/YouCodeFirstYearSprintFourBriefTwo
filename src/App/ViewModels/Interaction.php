<?php

namespace App\ViewModels;

use DateTime;

class Interaction{
    private int $id;
	private string $first_name;
	private string $last_name;
    private int $article_id;
    private int $author_id;
    private string $title;
    private string $content;
    private DateTime $created_at;
    private string $type;

    public function __construct(int $id, string $first_name, string $last_name, int $article_id, int $author_id, string $title, string $content, string $created_at, string $type){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->article_id = $article_id;
        $this->author_id = $author_id;
        $this->title = $title;
        $this->content = $content;
        $this->created_at = new DateTime($created_at);
        $this->type = $type;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
}