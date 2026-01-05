<?php

namespace App\DAOs;

use Core\Database\Database;

class CategoryDAO{
    private static ?CategoryDAO $instance = null;

    private function __construct() {}

    public static function getInstance(): CategoryDAO{
        if(self::$instance === null){
            self::$instance = new CategoryDAO();
        }

        return self::$instance;
    }

    public function findByArticle(int $articleId): ?array
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            SELECT c.id, c.name, c.description
            FROM article_category ac
            JOIN categories c ON ac.category_id = c.id
            WHERE ac.article_id = :article_id
        ");

        $status = $stmt->execute(['article_id' => $articleId]);

        if ($status){
            return $stmt->fetchAll();
        }

        return null;
    }

    public function getAll(): ?array
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM categories");

        $status = $stmt->execute();

        if ($status){
            return $stmt->fetchAll();
        }

        return null;
    }

    public function getAllWithArticleCount(): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT c.*, COUNT(a.id) as article_count FROM categories c LEFT JOIN article_category a ON c.id = a.category_id GROUP BY c.id ORDER BY c.id DESC");

        $status = $stmt->execute();

        if($status && $stmt->rowCount() > 0){
            return $stmt->fetchAll();
        }

        return null;
    }

    public function getUnusedCategoriesCount(): ?int{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT COUNT(id) as count FROM categories WHERE id NOT IN (SELECT category_id FROM article_category)");

        $status = $stmt->execute();

        if($status && $stmt->rowCount() > 0){
            return (int) $stmt->fetchColumn();
        }

        return null;
    }

    public function getMostUsedCategoryName(): ?string{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT c.name, COUNT(a.id) as article_count FROM categories c LEFT JOIN article_category a ON c.id = a.category_id GROUP BY c.id ORDER BY article_count DESC LIMIT 1");

        $status = $stmt->execute();

        if($status && $stmt->rowCount() > 0){
            return (string) $stmt->fetchColumn();
        }

        return null;
    }

    public function getById(int $id): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM categories WHERE id = :id");

        $status = $stmt->execute(['id' => $id]);

        if($status && $stmt->rowCount() > 0){
            return $stmt->fetch();
        }

        return null;
    }

    public function insert(array $data): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("INSERT INTO categories (name, description) VALUES (:name, :description)");

        return $stmt->execute([
            "name" => $data["name"],
            "description" => $data["description"]
        ]);
    }


    public function update(int $id, array $data): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("UPDATE categories SET name = :name, description = :description WHERE id = :id");

        return $stmt->execute([
            "name" => $data["name"],
            "description" => $data["description"],
            "id" => $id
        ]);
    }

    public function delete(int $id): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("DELETE FROM categories WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

}