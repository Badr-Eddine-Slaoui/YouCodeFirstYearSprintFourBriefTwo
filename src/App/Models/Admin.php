<?php

namespace App\Models;

use App\Enums\UserRole;

class Admin extends User{
    private $role = UserRole::ADMIN->value;

    public function role(): string{
        return $this->role;
    }
}