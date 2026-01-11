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
            (int) $row["id"],
            $row["first_name"],
            $row["last_name"],
            $row["email"],
            $row["password"],
            $row["is_baned"],
            $row["is_blacklisted"],
            $row["suspend_until"],
            $row["timeouted_until"],
            $row["created_at"],
        );
    }
}