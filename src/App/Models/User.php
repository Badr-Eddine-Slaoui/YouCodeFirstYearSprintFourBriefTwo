<?php

namespace App\Models;

use DateTime;

abstract class User{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private bool $is_baned;
    private bool $is_blacklisted;
    private ?DateTime $suspend_until;
    private ?DateTime $timeouted_until;

    private DateTime $created_at;

    public function __construct(int $id, string $first_name, string $last_name, string $email, string $password, bool $is_baned, bool $is_blacklisted, ?string $suspend_until, ?string $timeouted_until, string $created_at){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->is_baned = $is_baned;
        $this->is_blacklisted = $is_blacklisted;
        $this->suspend_until = $suspend_until ? new DateTime($suspend_until) : null;
        $this->timeouted_until = $timeouted_until ? new DateTime($timeouted_until) : null;
        $this->created_at = new DateTime($created_at);
    }

    abstract public function role(): string;

    public function getID(): int{
        return $this->id;
    }

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

    public function getPassword(): string{
        return $this->password;
    }

    public function isBanned(): bool{
        return $this->is_baned;
    }

    public function isBlacklisted(): bool{
        return $this->is_blacklisted;
    }

    public function isSuspended(): bool{
        return $this->suspend_until ? $this->suspend_until > new DateTime() : false;
    }

    public function isTimeouted(): bool{
        return $this->timeouted_until ? $this->timeouted_until > new DateTime() : false;
    }

    public function getTimeoutedUntil(): ?DateTime{
        return $this->timeouted_until;
    }

    public function getSuspendUntil(): ?DateTime{
        return $this->suspend_until;
    }

    public function getCreatedAt(): DateTime{
        return $this->created_at;
    }

}