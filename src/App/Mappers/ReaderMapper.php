<?php

namespace App\Mappers;

use App\Models\Reader;

class ReaderMapper{
    private static ?ReaderMapper $instance = null;

    private function __construct() {}

    public static function getInstance(): ReaderMapper{
        if(self::$instance === null){
            self::$instance = new ReaderMapper();
        }

        return self::$instance;
    }
    
    public function map(array $row): Reader
    {
        return new Reader(
            $row["first_name"],
            $row["last_name"],
            $row["email"],
            $row["password"],
            $row["created_at"],
        );
    }
}