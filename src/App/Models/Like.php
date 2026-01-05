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

    public static function is_liked_by(int $reader_id, int $target_id){
        $db = new Database() ;
        $stmt = $db->prepare("SELECT * FROM likes WHERE reader_id = :reader_id AND (article_id = :article_id OR comment_id = :comment_id)");
        $status = $stmt->execute(["reader_id" => $reader_id, "article_id" => $target_id, "comment_id"=> $target_id]);
        if($status){
            if($stmt->rowCount() > 0){
                return true;
            }
        }
        return false;
    }
}