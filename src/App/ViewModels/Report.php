<?php

namespace App\ViewModels;

use DateTime;

class Report{
    private int $id;
    private int $user_id;
    private string $first_name;
    private string $last_name;
    private string $content;
    private string $reason;
    private string $status;
    private DateTime $created_at;
    private string $type;

    public function __construct(int $id, int $user_id, string $first_name, string $last_name, string $content, string $reason, string $status, string $created_at, string $type){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->content = $content;
        $this->reason = $reason;
        $this->status = $status;
        $this->created_at = new DateTime($created_at);
        $this->type = $type;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
}