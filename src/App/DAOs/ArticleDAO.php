<?php

namespace App\DAOs;

use Core\Database\Database;

class ArticleDAO{

    private static ?ArticleDAO $instance = null;

    private function __construct() {}

    public static function getInstance(): ArticleDAO{
        if(self::$instance === null){
            self::$instance = new ArticleDAO();
        }

        return self::$instance;
    }

    public function getAll(): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("
            SELECT a.*, 
            COUNT(DISTINCT l.id) AS likes_count,
            COUNT(DISTINCT c.id) AS comments_count
            FROM articles a
            LEFT JOIN likes l ON a.id = l.article_id
            LEFT JOIN comments c ON a.id = c.article_id
            GROUP BY a.id
            ORDER BY a.created_at DESC
        ");

        $status = $stmt->execute();

        if($status){
            return $stmt->fetchAll();
        }

        return null;
    }

    public function findByAuthor(int $authorId): ?array
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            SELECT a.*, 
            COUNT(DISTINCT l.id) AS likes_count,
            COUNT(DISTINCT c.id) AS comments_count
            FROM articles a
            LEFT JOIN likes l ON a.id = l.article_id
            LEFT JOIN comments c ON a.id = c.article_id
            WHERE a.author_id = :author_id
            GROUP BY a.id
            ORDER BY a.created_at DESC
        ");

        $status = $stmt->execute(['author_id' => $authorId]);

        if($status){
            return $stmt->fetchAll();
        }

        return null;
    }

    public function findById(int $id): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("
            SELECT a.*, 
            COUNT(DISTINCT l.id) AS likes_count,
            COUNT(DISTINCT c.id) AS comments_count
            FROM articles a
            LEFT JOIN likes l ON a.id = l.article_id
            LEFT JOIN comments c ON a.id = c.article_id
            WHERE a.id = :id
            GROUP BY a.id
            ORDER BY a.created_at DESC
        ");

        $status = $stmt->execute(['id' => $id]);

        if($status){
            return $stmt->fetch();
        }

        return null;
    }

    public function insert(array $data): ?int
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            INSERT INTO articles (title, cover, body, author_id)
            VALUES (:title, :cover, :body, :author_id)
        ");

        $status = $stmt->execute([
            "title" => $data['title'],
            "cover" => $data['cover'],
            "body" => $data['body'],
            "author_id" => $data['author_id']
        ]);

        if($status){
            return (int) $db->lastInsertId();
        }

        return null;
    }

    public function update(int $id, array $data): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            UPDATE articles
            SET title = :title, cover = :cover, body = :body
            WHERE id = :id
        ");

        return $stmt->execute([
            "title"=> $data["title"],
            "cover" => $data["cover"],
            "body" => $data["body"],
            "id" => $id
        ]);
    }

    public function delete(int $id): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("DELETE FROM articles WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}