<?php

namespace App\Mappers;

use App\Models\Category;

class CategoryMapper{
    private static ?CategoryMapper $instance = null;

    private function __construct() {}

    public static function getInstance(): CategoryMapper{
        if(self::$instance === null){
            self::$instance = new CategoryMapper();
        }

        return self::$instance;
    }
    public function mapMany(array $rows): array
    {
        return array_map(
            fn ($row) => new Category($row['id'], $row['name'], $row['description'], $row['article_count'] ?? 0),
            $rows
        );
    }

    public function map(array $row): Category
    {
        return new Category($row['id'], $row['name'], $row['description'], $row['article_count'] ?? 0);
    }
}