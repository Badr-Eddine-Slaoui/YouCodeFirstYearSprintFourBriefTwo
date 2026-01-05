<?php

namespace App\Models;

use App\Enums\UserRole;

class Reader extends User{
    private $role = UserRole::READER->value;

    public function role(): string{
        return $this->role;
    }
}