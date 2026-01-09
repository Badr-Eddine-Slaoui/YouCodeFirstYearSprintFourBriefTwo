<?php

namespace App\Repositories;

use App\DAOs\AuthorDAO;
use App\Mappers\InteractionMapper;

class AuthorRepository{
    private static ?AuthorRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): AuthorRepository{
        if(self::$instance === null){
            self::$instance = new AuthorRepository();
        }

        return self::$instance;
    }

    public function getAuthor(int $id): ?array{
        $authorDAO = AuthorDAO::getInstance();
        return $authorDAO->findById($id);
    }

    public function findInteractions(int $authorId): ?array{
        $authorDAO = AuthorDAO::getInstance();
        $interactionMapper = InteractionMapper::getInstance();
        $rows = $authorDAO->getAuthorArticlesInteractions($authorId);

        if($rows){
            return $interactionMapper->map($rows);
        }

        return null;

    }
}