<?php

namespace App\DAOs;

use Core\Database\Database;

class ReaderDAO{

    private static ?ReaderDAO $instance = null;

    private function __construct() {}

    public static function getInstance(): ReaderDAO{
        if(self::$instance === null){
            self::$instance = new ReaderDAO();
        }

        return self::$instance;
    }

    public function findById(int $id): ?array{
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");

        $status = $stmt->execute(['id' => $id]);

        if($status){
            return $stmt->fetch();
        }

        return null;
    }
    
}