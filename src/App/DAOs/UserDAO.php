<?php

namespace App\DAOs;

use Core\Database\Database;
use DateTime;

class UserDAO{

    private static ?UserDAO $instance = null;

    private function __construct() {}

    public static function getInstance(): UserDAO{
        if(self::$instance === null){
            self::$instance = new UserDAO();
        }

        return self::$instance;
    }

    public function findAll(): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM users");

        $status = $stmt->execute();

        if($status){
            return $stmt->fetchAll();
        }

        return null;
    }

    public function getCount(): ?int
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT COUNT(id) as count FROM users");

        $status = $stmt->execute();

        if ($status) {
            return (int) $stmt->fetchColumn();
        }

        return null;
    }

    public function findById(int $id): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");

        $status = $stmt->execute(['id' => $id]);

        if($status){
            return $stmt->fetch() ?: null;
        }

        return null;
    }

    public function getRecentActivities(): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("
            SELECT *
            FROM (
                SELECT 
                    l.id,
                    u.first_name,
                    u.last_name,
                    a.title,
                    l.created_at AS created_at,
                    'like' AS type
                FROM articles a
                JOIN likes l ON a.id = l.article_id
                JOIN users u ON u.id = l.reader_id

                UNION ALL

                SELECT 
                    c.id,
                    u.first_name,
                    u.last_name,
                    a.title,
                    c.created_at AS created_at,
                    'comment' AS type
                FROM articles a
                JOIN comments c ON a.id = c.article_id
                JOIN users u ON u.id = c.reader_id

                UNION ALL

                SELECT 
                    a.id,
                    u.first_name,
                    u.last_name,
                    a.title,
                    a.created_at AS created_at,
                    'article' AS type
                FROM articles a
                JOIN users u ON u.id = a.author_id

                UNION ALL

                SELECT 
                    u.id,
                    u.first_name,
                    u.last_name,
                    '' AS title,
                    u.created_at AS created_at,
                    'user' AS type
                FROM users u

                UNION ALL

                SELECT 
                    r.id,
                    u.first_name,
                    u.last_name,
                    a.title,
                    r.created_at AS created_at,
                    'comment report' AS type
                FROM reports r
                JOIN comments c ON r.comment_id = c.id
                JOIN articles a ON a.id = c.article_id
                JOIN users u ON u.id = r.reader_id

                UNION ALL

                SELECT 
                    r.id,
                    u.first_name,
                    u.last_name,
                    a.title,
                    r.created_at AS created_at,
                    'article report' AS type
                FROM reports r
                JOIN articles a ON a.id = r.article_id
                JOIN users u ON u.id = r.reader_id
            ) AS activities
            ORDER BY created_at DESC
            LIMIT 5;
        ");

        $status = $stmt->execute();

        if($status){
            return $stmt->fetchAll();
        }

        return null;
    }

    public function getAuthorArticlesInteractions(int $id): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("
            SELECT *
            FROM (
                SELECT 
                    l.id,
                    u.first_name,
                    u.last_name,
                    '' AS body,
                    l.article_id,
                    a.author_id,
                    a.title,
                    l.created_at AS created_at,
                    'like' AS type
                FROM articles a
                JOIN likes l ON a.id = l.article_id
                JOIN users u ON u.id = l.reader_id
                WHERE a.author_id = :id

                UNION ALL

                SELECT 
                    c.id,
                    u.first_name,
                    u.last_name,
                    c.body,
                    c.article_id,
                    a.author_id,
                    a.title,
                    c.created_at AS created_at,
                    'comment' AS type
                FROM articles a
                JOIN comments c ON a.id = c.article_id
                JOIN users u ON u.id = c.reader_id
                WHERE a.author_id = :id
            ) AS interactions
            ORDER BY created_at DESC
            LIMIT 5;
        ");

        $status = $stmt->execute(['id' => $id]);

        if($status){
            return $stmt->fetchAll();
        }

        return null;
    }

    public function banUser(int $id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("UPDATE users SET is_baned = TRUE WHERE id = :id");

        return $stmt->execute(['id' => $id]);
    }

    public function blacklistUser(int $id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("UPDATE users SET is_blacklisted = TRUE WHERE id = :id");

        return $stmt->execute(['id' => $id]);
    }

    public function timeoutUser(int $id, string $timeoutDuration): bool{
        $db = Database::getInstance();

        $timeoutDateTime = new DateTime($timeoutDuration);

        $stmt = $db->prepare('UPDATE users SET timeouted_until = :timeout_duration WHERE id = :id');

        return $stmt->execute([
            "id" => $id,
            "timeout_duration" => $timeoutDateTime->format("Y-m-d H:i:s"),
        ]);
    }

    public function suspendUser(int $id, string $suspendDuration): bool{
        $db = Database::getInstance();

        $suspendDateTime = new DateTime($suspendDuration);

        $stmt = $db->prepare("UPDATE users SET suspend_until = :suspend_duration WHERE id = :id");

        return $stmt->execute([
            "id" => $id,
            "suspend_duration" => $suspendDateTime->format("Y-m-d H:i:s"),
        ]);
    }

    public function unbanUser(int $id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("UPDATE users SET is_baned = FALSE WHERE id = :id");

        return $stmt->execute(['id' => $id]);
    }

    public function unblacklistUser(int $id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("UPDATE users SET is_blacklisted = FALSE WHERE id = :id");

        return $stmt->execute(['id' => $id]);
    }

    public function untimeoutUser(int $id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare('UPDATE users SET timeouted_until = NULL WHERE id = :id');

        return $stmt->execute(['id' => $id]);
    }

    public function unsuspendUser(int $id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("UPDATE users SET suspend_until = NULL WHERE id = :id");

        return $stmt->execute(['id' => $id]);
    }
    
}