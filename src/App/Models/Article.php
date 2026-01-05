<?php

namespace App\Models;

use App\Interfaces\Likable;
use Core\Database\Database;
use DateTime;

class Article implements Likable{
    private int $id;
    private string $title;
    private string $content;
    private string $cover;
    private int $author_id;
    private array $categories;
    private DateTime $created_at;
    private int $likes_count;
    private int $comments_count;

    public function __construct(int $id, string $title, string $content, string $cover, int $author_id, array $categories, string $created_at, int $likes_count = 0, int $comments_count = 0){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->cover = $cover;
        $this->author_id = $author_id;
        $this->categories = $categories;
        $this->created_at = new DateTime($created_at);
        $this->likes_count = $likes_count;
        $this->comments_count = $comments_count;
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }

    public function author(){
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $status = $stmt->execute([$this->author_id]);

        if($status){
            $data = $stmt->fetch();
            return new Author($data['first_name'], $data['last_name'], $data['email'], $data['password'], $data['created_at']);
        }

        return null;
    }

    public function comments(){
        $db = Database::getInstance();

        $stmt = $db->prepare('SELECT * FROM comments WHERE article_id = :article_id ORDER BY created_at DESC');
        $status = $stmt->execute(["article_id" => $this->id]);

        if($status){
            $data = $stmt->fetchAll();
            $comments = [];
            foreach ($data as $comment) {
                $stmt = $db->prepare("SELECT COUNT(id) as likes_count FROM likes WHERE comment_id = :comment_id");
                $status = $stmt->execute(["comment_id" => $comment['id']]);
                if($status){
                    $likes_count = $stmt->fetchColumn();
                    $comments[] = new Comment($comment['id'], $comment['article_id'], $comment['reader_id'], $comment['body'], $comment['created_at'], $likes_count);
                }
            }
            return $comments;
        }

        return null;
    }

    public static function like(int $article_id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("INSERT INTO likes (reader_id, article_id) VALUES (:reader_id, :article_id)");
        return $stmt->execute([
            "reader_id" => session()->get("user_id"),
            "article_id" => $article_id
        ]);
    }

    public static function unlike(int $article_id): bool{
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM likes WHERE reader_id = :reader_id AND article_id = :article_id");
        return $stmt->execute([
            "reader_id" => session()->get("user_id"),
            "article_id" => $article_id
        ]);
    }
}