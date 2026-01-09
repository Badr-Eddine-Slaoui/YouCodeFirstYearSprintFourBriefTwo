<?php

namespace App\DAOs;

use Core\Database\Database;

class LikeDAO{
    private static ?LikeDAO $instance = null;

    private function __construct() {}

    public static function getInstance(): LikeDAO{
        if(self::$instance === null){
            self::$instance = new LikeDAO();
        }

        return self::$instance;
    }

    public function getByArticleAuthor(int $articleAuthorId): ?array
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT l.*
            FROM likes l
            LEFT JOIN articles a ON a.id = l.article_id
            WHERE a.author_id = :article_author_id
            ORDER BY l.created_at DESC");

        $status = $stmt->execute(['article_author_id' => $articleAuthorId]);

        if ($status) {
            return $stmt->fetchAll();
        }

        return null;
    }

    public function getAuthorLikesCount(int $authorId): ?int{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT COUNT(l.id) as count FROM likes l LEFT JOIN articles a ON a.id = l.article_id WHERE a.author_id = :author_id");

        $status = $stmt->execute(["author_id"=> $authorId]);

        if ($status) {
            return (int) $stmt->fetchColumn();
        }

        return null;
    }

    public function getAuthorDailyAvgLikesCount(int $authorId): ?int{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT COUNT(l.id) as count 
                                    FROM likes l 
                                    LEFT JOIN articles a 
                                    ON a.id = l.article_id 
                                    WHERE a.author_id = :author_id 
                                    AND EXTRACT(WEEK FROM l.created_at) = EXTRACT(WEEK FROM CURRENT_DATE)
                                    AND EXTRACT(YEAR FROM l.created_at) = EXTRACT(YEAR FROM CURRENT_DATE)");

        $status = $stmt->execute(["author_id"=> $authorId]);

        if ($status) {
            return (int) $stmt->fetchColumn();
        }

        return null;
    }

    public function likeArticle(int $articleId, int $userId): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            INSERT INTO likes (reader_id, article_id)
            VALUES (:reader_id, :article_id)
        ");

        return $stmt->execute([
            'reader_id' => $userId,
            'article_id' => $articleId
        ]);
    }

    public function unlikeArticle(int $articleId, int $userId): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            DELETE FROM likes
            WHERE reader_id = :reader_id AND article_id = :article_id
        ");

        return $stmt->execute([
            'reader_id' => $userId,
            'article_id' => $articleId
        ]);
    }

    public function likeComment(int $commentId, int $userId): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            INSERT INTO likes (reader_id, comment_id)
            VALUES (:reader_id, :comment_id)
        ");

        return $stmt->execute([
            'reader_id' => $userId,
            'comment_id' => $commentId
        ]);
    }

    public function unlikeComment(int $commentId, int $userId): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            DELETE FROM likes
            WHERE reader_id = :reader_id AND comment_id = :comment_id
        ");

        return $stmt->execute([
            'reader_id' => $userId,
            'comment_id' => $commentId
        ]);
    }

    public function isLikedBy(int $reader_id, int $target_id, string $target_type): bool{
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM likes WHERE reader_id = :reader_id AND {$target_type}_id = :target_id");
        $status = $stmt->execute(["reader_id" => $reader_id, "target_id" => $target_id]);
        if($status){
            if($stmt->rowCount() > 0){
                return true;
            }
        }
        return false;
    }
}