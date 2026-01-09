<?php

namespace App\DAOs;

use Core\Database\Database;

class AuthorDAO{

    private static ?AuthorDAO $instance = null;

    private function __construct() {}

    public static function getInstance(): AuthorDAO{
        if(self::$instance === null){
            self::$instance = new AuthorDAO();
        }

        return self::$instance;
    }

    public function findById(int $id): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id and role = 'author'");

        $status = $stmt->execute(['id' => $id]);

        if($status){
            return $stmt->fetch();
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
    
}