<?php

namespace App\Mappers;

use App\Models\Author;

class AuthorMapper{
    private static ?AuthorMapper $instance = null;

    private function __construct() {}

    public static function getInstance(): AuthorMapper{
        if(self::$instance === null){
            self::$instance = new AuthorMapper();
        }

        return self::$instance;
    }
    
    public function map(array $row): Author
    {
        return new Author(
            $row["first_name"],
            $row["last_name"],
            $row["email"],
            $row["password"],
            $row["created_at"],
        );
    }
}