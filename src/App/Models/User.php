<?php

namespace App\Models;

use DateTime;

abstract class User{
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private DateTime $created_at;

    public function __construct(string $first_name, string $last_name, string $email, string $password, string $created_at){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = new DateTime($created_at);
    }

    abstract public function role(): string;

    public function getFirstName(): string{
        return $this->first_name;
    }

    public function getLastName(): string{
        return $this->last_name;
    }

    public function getFullName(): string{
        return $this->first_name . " " . $this->last_name;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getCreatedAt(): DateTime{
        return $this->created_at;
    }

}