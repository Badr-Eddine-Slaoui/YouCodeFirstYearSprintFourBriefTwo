<?php

namespace App\Models;

use App\Enums\UserRole;

class Author extends User{
    private $role = UserRole::AUTHOR->value;

    public function role(): string{
        return $this->role;
    }
}