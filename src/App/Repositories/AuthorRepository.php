<?php

namespace App\Repositories;

use App\DAOs\UserDAO;
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
        $userDAO = UserDAO::getInstance();
        return $userDAO->findById($id);
    }

    public function findInteractions(int $authorId): ?array{
        $userDAO = UserDAO::getInstance();
        $interactionMapper = InteractionMapper::getInstance();
        $rows = $userDAO->getAuthorArticlesInteractions($authorId);

        if(!is_null($rows)){
            return $interactionMapper->map($rows);
        }

        return null;

    }
}