<?php

namespace App\Repositories;

use App\DAOs\CommentDAO;
use App\Mappers\CommentMapper;

class CommentRepository{
    private static ?CommentRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): CommentRepository{
        if(self::$instance === null){
            self::$instance = new CommentRepository();
        }

        return self::$instance;
    }

    public function getAll(): ?array{
        $commentDAO = CommentDAO::getInstance();
        $commentMapper= CommentMapper::getInstance();

        $rows = $commentDAO->getAll();

        if($rows){
            return $commentMapper->mapAll($rows);
        }

        return null;
    }

    public function getByArticle(int $articleId): ?array{
        $commentDAO = CommentDAO::getInstance();
        return $commentDAO->getByArticleId($articleId);
    }

    public function create(array $data): bool{
        $commentDAO = CommentDAO::getInstance();
        return $commentDAO->insert($data);
    }

    public function update(int $id, array $data): bool{
        $commentDAO = CommentDAO::getInstance();
        return $commentDAO->update($id, $data);
    }

    public function delete(int $id): bool{
        $commentDAO = CommentDAO::getInstance();
        return $commentDAO->delete($id);
    }
}