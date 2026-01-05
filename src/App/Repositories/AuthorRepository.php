<?php

namespace App\Repositories;

use App\DAOs\AuthorDAO;

class AuthorRepository{
    private static ?AuthorRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): AuthorRepository{
        if(self::$instance === null){
            self::$instance = new AuthorRepository();
        }

        return self::$instance;
    }

    public function getAuthor(int $id): ?array{
        $authorDAO = AuthorDAO::getInstance();
        return $authorDAO->findById($id);
    }
}