<?php

namespace App\DAOs;

use Core\Database\Database;

class ReportDAO{
    private static ?ReportDAO $instance = null;

    private function __construct() {}

    public static function getInstance(): ReportDAO{
        if(self::$instance === null){
            self::$instance = new ReportDAO();
        }

        return self::$instance;
    }

    public function getAll(): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("
            SELECT *
            FROM (
                SELECT 
                    r.id,
                    u.id AS user_id,
                    u.first_name,
                    u.last_name,
                    a.title AS content,
                    r.message AS reason,
                    r.status,
                    r.created_at AS created_at,
                    'article' AS type
                FROM articles a
                JOIN reports r ON a.id = r.article_id
                JOIN users u ON u.id = r.reader_id

                UNION ALL

                SELECT 
                    r.id,
                    u.id AS user_id,
                    u.first_name,
                    u.last_name,
                    c.body AS content,
                    r.message AS reason,
                    r.status,
                    r.created_at AS created_at,
                    'comment' AS type
                FROM comments c
                JOIN reports r ON c.id = r.comment_id
                JOIN users u ON u.id = r.reader_id
            ) AS reports
            ORDER BY created_at DESC
        ");

        $status = $stmt->execute();

        if($status){
            return $stmt->fetchAll();
        }else{
            return null;
        }
    }

    public function reportArticle(int $articleId, int $userId, string $reportReason): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("INSERT INTO reports (reader_id, article_id, message) VALUES (:reader_id, :article_id, :message)");

        return $stmt->execute([
            'reader_id' => $userId,
            'article_id' => $articleId,
            'message'=> $reportReason
        ]);
    }

    public function unreportArticle(int $articleId, int $userId): bool
    {
        $db = Database::getInstance();
        
        $stmt = $db->prepare('DELETE FROM reports WHERE reader_id = :reader_id AND article_id = :article_id');

        return $stmt->execute([
            'reader_id' => $userId,
            'article_id' => $articleId
        ]);
    }

    public function reportComment(int $commentId, int $userId, string $reportReason): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare('INSERT INTO reports (reader_id, comment_id, message) VALUES (:reader_id, :comment_id, :message)');

        return $stmt->execute([
            'reader_id' => $userId,
            'comment_id' => $commentId,
            'message'=> $reportReason
        ]);
    }

    public function unreportComment(int $commentId, int $userId): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare('DELETE FROM reports WHERE reader_id = :reader_id AND comment_id = :comment_id');

        return $stmt->execute([
            'reader_id' => $userId,
            'comment_id' => $commentId
        ]);
    }

    public function isReportedBy(int $reader_id, int $target_id): bool{
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM reports WHERE reader_id = :reader_id AND (article_id = :article_id OR comment_id = :comment_id)");
        $status = $stmt->execute(["reader_id" => $reader_id, "article_id" => $target_id, "comment_id"=> $target_id]);
        if($status){
            if($stmt->rowCount() > 0){
                return true;
            }
        }
        return false;
    }

    public function resolveReport(int $reportId): bool{
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE reports SET status = 'resolved' WHERE id = :id");
        return $stmt->execute(['id' => $reportId]);
    }

    public function resolvedCount(): ?int{
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT COUNT(*) FROM reports WHERE status = 'resolved'");
        $status = $stmt->execute();
        if($status){
            return $stmt->fetchColumn();
        }
        return null;
    }

    public function pendingCount(): ?int{
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT COUNT(*) FROM reports WHERE status = 'pending'");
        $status = $stmt->execute();
        if($status){
            return $stmt->fetchColumn();
        }
        return null;
    }
}