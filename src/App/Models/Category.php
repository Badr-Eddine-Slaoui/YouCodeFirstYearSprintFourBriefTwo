<?php

namespace App\Models;

class Category{
    private int $id;
    private string $name;
    private string $description;
    private int $articles_count;

    public function __construct(int $id, string $name, string $description, int $articles_count = 0){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->articles_count = $articles_count;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
}