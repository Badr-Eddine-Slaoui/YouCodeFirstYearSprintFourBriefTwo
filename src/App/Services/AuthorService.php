<?php

namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService{
    private static ?AuthorService $authorService = null;

    private function __construct() {}

    public static function getInstance(): AuthorService{
        if (self::$authorService === null) {
            self::$authorService = new AuthorService();
        }

        return self::$authorService;
    }

    public function getInteractions(int $authorId): ?array{
        $authorRepository = AuthorRepository::getInstance();
        return $authorRepository->findInteractions($authorId);
    }
}