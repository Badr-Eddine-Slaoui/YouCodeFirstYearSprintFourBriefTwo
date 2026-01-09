<?php

namespace App\Models;

use App\Enums\ReportReason;
use DateTime;

class Report{
    private int $id;
    private ReportReason $message;
    private int $reader_id;
    private ?int $comment_id;
    private ?int $article_id;
    private DateTime $created_at;

    public function __construct(int $id, ReportReason $reportReason, int $reader_id, string $created_at, ?int $comment_id = null, ?int $article_id = null){
        $this->id = $id;
        $this->message = $reportReason;
        $this->reader_id = $reader_id;
        $this->comment_id = $comment_id;
        $this->article_id = $article_id;
        $this->created_at = new DateTime($created_at);
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }
}