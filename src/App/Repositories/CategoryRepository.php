<?php

namespace App\Repositories;

use App\DAOs\CategoryDAO;
use App\Mappers\CategoryMapper;
use App\Models\Category;

class CategoryRepository{
    private static ?CategoryRepository $CategoryRepository = null;

    private function __construct() {}

    public static function getInstance(): CategoryRepository{
        if (self::$CategoryRepository === null) {
            self::$CategoryRepository = new CategoryRepository();
        }

        return self::$CategoryRepository;
    }

    public function getAll(): ?array{
        $categoryDAO = CategoryDAO::getInstance();
        $categoryMapper= CategoryMapper::getInstance();

        $rows = $categoryDAO->getAll();

        if(!is_null($rows)){
            return $categoryMapper->mapMany($rows);
        }

        return null;
    }

    public function getAllWithArticleCount(): ?array{
        $categoryDAO = CategoryDAO::getInstance();
        $categoryMapper= CategoryMapper::getInstance();

        $rows = $categoryDAO->getAllWithArticleCount();

        if(!is_null($rows)){
            return $categoryMapper->mapMany($rows);
        }

        return null;
    }

    public function getUnusedCategoriesCount(): ?int{
        $categoryDAO = CategoryDAO::getInstance();

        return $categoryDAO->getUnusedCategoriesCount();
    }

    public function getMostUsedCategoryName(): ?string{
        $categoryDAO = CategoryDAO::getInstance();

        return $categoryDAO->getMostUsedCategoryName();
    }

    public function getCategory(int $id): ?Category{
        $categoryDAO = CategoryDAO::getInstance();
        $categoryMapper= CategoryMapper::getInstance();

        $row = $categoryDAO->getById($id);

        if(!is_null($row)){
            return $categoryMapper->map($row);
        }

        return null;
    }

    public function create(array $categoryData): bool{
        $categoryDao = CategoryDAO::getInstance();
        return $categoryDao->insert($categoryData);
    }

    public function update(int $id, array $categoryData): bool{
        $categoryDao = CategoryDAO::getInstance();
        return $categoryDao->update($id, $categoryData);
    }

    public function delete(int $id): bool{
        $categoryDao = CategoryDAO::getInstance();
        return $categoryDao->delete($id);
    }
}