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

    public function isLikedBy(int $reader_id, int $target_id): bool{
        $db = Database::getInstance();
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