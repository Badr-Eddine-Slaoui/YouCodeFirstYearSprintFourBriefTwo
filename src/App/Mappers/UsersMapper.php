<?php

namespace App\Mappers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Reader;

class UsersMapper{
    private static ?UsersMapper $instance = null;

    private function __construct() {}

    public static function getInstance(): UsersMapper{
        if(self::$instance === null){
            self::$instance = new UsersMapper();
        }

        return self::$instance;
    }
    
    public function mapMany(array $users): array {
        return array_map(
            function($user) {
                return match($user["role"]) {
                    "reader" => new Reader(
                        (int) $user["id"],
                        $user["first_name"],
                        $user["last_name"],
                        $user["email"],
                        $user["password"],
                        $user["is_baned"],
                        $user["is_blacklisted"],
                        $user["suspend_until"],
                        $user["timeouted_until"],
                        $user["created_at"],
                    ),
                    "author" => new Author(
                        (int) $user["id"],
                        $user["first_name"],
                        $user["last_name"],
                        $user["email"],
                        $user["password"],
                        $user["is_baned"],
                        $user["is_blacklisted"],
                        $user["suspend_until"],
                        $user["timeouted_until"],
                        $user["created_at"],
                    ),
                    "admin" => new Admin(
                        (int) $user["id"],
                        $user["first_name"],
                        $user["last_name"],
                        $user["email"],
                        $user["password"],
                        $user["is_baned"],
                        $user["is_blacklisted"],
                        $user["suspend_until"],
                        $user["timeouted_until"],
                        $user["created_at"],
                    ),
                    default => null
                };
            },
            $users
        );
    }
}