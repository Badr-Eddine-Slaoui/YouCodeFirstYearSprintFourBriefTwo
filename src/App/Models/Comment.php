<?php

namespace App\Models;

use App\Interfaces\Likable;
use Core\Database\Database;
use DateTime;

class Comment implements Likable{
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

    public function reader(){
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $status = $stmt->execute(["id" => $this->reader_id]);

        if($status){
            $data = $stmt->fetch();
            return new Author($data['first_name'], $data['last_name'], $data['email'], $data['password'], $data['created_at']);
        }

        return null;
    }

    public static function like(int $comment_id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("INSERT INTO likes (reader_id, comment_id) VALUES (:reader_id, :comment_id)");
        return $stmt->execute([
            "reader_id" => session()->get("user_id"),
            "comment_id" => $comment_id
        ]);
    }
    
    public static function unlike(int $comment_id): bool{
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM likes WHERE reader_id = :reader_id AND comment_id = :comment_id");
        return $stmt->execute([
            "reader_id" => session()->get("user_id"),
            "comment_id" => $comment_id
        ]);
    }
}