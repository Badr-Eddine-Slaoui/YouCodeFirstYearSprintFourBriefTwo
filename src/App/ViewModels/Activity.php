<?php

namespace App\ViewModels;

use DateTime;

class Activity{
    private int $id;
	private string $first_name;
	private string $last_name;
    private string $title;
    private DateTime $created_at;
    private string $type;

    public function __construct(int $id, string $first_name, string $last_name, string $title, string $created_at, string $type){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->title = $title;
        $this->created_at = new DateTime($created_at);
        $this->type = $type;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
}