<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Core\Helpers\Validator;

class CategoryService {
    private static ?CategoryService $categoryService = null;

    private function __construct(){}

    public static function getInstance(): CategoryService{
        if (self::$categoryService === null) {
            self::$categoryService = new CategoryService();
        }

        return self::$categoryService;
    }

    public function getCategories(): ?array{
        $categoryRepository = CategoryRepository::getInstance();
        return $categoryRepository->getAll();
    }

    public function getCategoriesWithArticleCount(): ?array{
        $categoryRepository = CategoryRepository::getInstance();
        return $categoryRepository->getAllWithArticleCount();
    }

    public function getUnusedCategoriesCount(): ?int{
        $categoryRepository = CategoryRepository::getInstance();
        return $categoryRepository->getUnusedCategoriesCount();
    }

    public function getMostUsedCategoryName(): ?string{
        $categoryRepository = CategoryRepository::getInstance();
        return $categoryRepository->getMostUsedCategoryName();
    }

    public function getCategory(int $id): ?Category{
        $categoryRepository = CategoryRepository::getInstance();
        return $categoryRepository->getCategory($id);
    }

    public function create(array $data): bool{
        if(!Validator::category($data)){
            return false; 
        }

        $categoryRepository = CategoryRepository::getInstance();
        return $categoryRepository->create($data);
    }

    public function update(int $id, array $data): bool{
        if(!Validator::category($data)){
            return false; 
        }

        $categoryRepository = CategoryRepository::getInstance();
        return $categoryRepository->update($id, $data);
    }

    public function delete(int $id): bool{
        $categoryRepository = CategoryRepository::getInstance();
        return $categoryRepository->delete($id);
    }
}