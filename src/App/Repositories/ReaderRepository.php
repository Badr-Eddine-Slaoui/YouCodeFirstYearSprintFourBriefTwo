<?php

namespace App\Repositories;

use App\DAOs\UserDAO;

class ReaderRepository{
    private static ?ReaderRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): ReaderRepository{
        if(self::$instance === null){
            self::$instance = new ReaderRepository();
        }

        return self::$instance;
    }

    public function getReader(int $id): ?array{
        $userDAO = UserDAO::getInstance();
        return $userDAO->findById($id);
    }
}