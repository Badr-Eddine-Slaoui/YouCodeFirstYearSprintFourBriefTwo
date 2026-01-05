<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use Core\Helpers\Validator;

class CommentService{
    private static ?CommentService $CommentService = null;

    private function __construct(){}

    public static function getInstance(): CommentService{
        if (self::$CommentService === null) {
            self::$CommentService = new CommentService();
        }

        return self::$CommentService;
    }

    public static function getAll(): ?array{
        $commentRepository = CommentRepository::getInstance();
        return $commentRepository->getAll();
    }

    public function create(array $data): bool{

        if(!Validator::comment($data)){
            return false; 
        }

        $commentRepository = CommentRepository::getInstance();
        return $commentRepository->create($data);
    }

    public function update(int $id, array $data): bool{
        if(!Validator::comment($data)){
            return false; 
        }

        $commentRepository = CommentRepository::getInstance();
        return $commentRepository->update($id, $data);
    }

    public function delete(int $id): bool{
        $commentRepository = CommentRepository::getInstance();
        return $commentRepository->delete($id);
    }
}