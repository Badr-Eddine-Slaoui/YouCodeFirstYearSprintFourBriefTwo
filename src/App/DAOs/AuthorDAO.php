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
    
}