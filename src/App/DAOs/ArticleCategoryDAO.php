<?php

namespace App\DAOs;

use Core\Database\Database;

class ArticleCategoryDAO
{
    private static ?ArticleCategoryDAO $articleCategory = null;

    private function __construct() {}

    public static function getInstance(): ArticleCategoryDAO
    {
        if (self::$articleCategory === null) {
            self::$articleCategory = new ArticleCategoryDAO();
        }

        return self::$articleCategory;
    }

    public function attachCategories(int $articleId, array $categoryIds): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            INSERT INTO article_category (article_id, category_id)
            VALUES (:article_id, :category_id)
        ");

        foreach ($categoryIds as $categoryId) {
            $status = $stmt->execute([
                'article_id' => $articleId,
                'category_id' => $categoryId
            ]);

            if (!$status){
                return false;
            }
        }

        return true;
    }

    public function detachCategories(int $articleId): bool
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            DELETE FROM article_category
            WHERE article_id = :article_id
        ");

        return $stmt->execute(['article_id' => $articleId]);
    }
}