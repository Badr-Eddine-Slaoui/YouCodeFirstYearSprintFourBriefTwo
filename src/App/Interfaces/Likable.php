<?php

namespace App\Interfaces;

interface Likable
{
    public static function like(int $id): bool;
    public static function unlike(int $id): bool;
}