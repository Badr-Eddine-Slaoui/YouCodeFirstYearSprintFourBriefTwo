<?php

namespace App\DAOs;

use Core\Database\Database;

class CommentDAO
{
    private static ?CommentDAO $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): CommentDAO
    {
        if (self::$instance === null) {
            self::$instance = new CommentDAO();
        }

        return self::$instance;
    }

    public function getAll(): ?array
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM comments");

        $status = $stmt->execute();

        if ($status) {
            return $stmt->fetchAll();
        }

        return null;
    }

    public function getByArticleId(int $articleId): ?array
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT c.*, COUNT(l.id) AS likes_count
            FROM comments c
            LEFT JOIN likes l ON l.comment_id = c.id
            WHERE c.article_id = :article_id
            GROUP BY c.id
            ORDER BY c.created_at DESC");

        $status = $stmt->execute(['article_id' => $articleId]);

        if ($status) {
            return $stmt->fetchAll();
        }

        return null;
    }

    public function insert(array $data): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("INSERT INTO comments (article_id, reader_id, body) VALUES (:article_id, :reader_id, :body)");

        return $stmt->execute([
            "article_id" => $data["article_id"],
            "reader_id" => session()->get("user_id"),
            "body" => $data["content"]
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("UPDATE comments SET body = :body WHERE id = :id");

        return $stmt->execute([
            "body" => $data["content"],
            "id" => $id
        ]);
    }

    public function delete(int $id): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("DELETE FROM comments WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}