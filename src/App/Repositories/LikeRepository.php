<?php

namespace App\Repositories;

use App\DAOs\LikeDAO;

class LikeRepository{
    private static ?LikeRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): LikeRepository{
        if(self::$instance === null){
            self::$instance = new LikeRepository();
        }

        return self::$instance;
    }

    public function likeArticle(int $articleId, int $userId): bool
    {
        $likeDAO = LikeDAO::getInstance();
        return $likeDAO->likeArticle($articleId, $userId);
    }

    public function unlikeArticle(int $articleId, int $userId): bool
    {
        $likeDAO = LikeDAO::getInstance();
        return $likeDAO->unlikeArticle($articleId, $userId);
    }

    public function likeComment(int $commentId, int $userId): bool
    {
        $likeDAO = LikeDAO::getInstance();
        return $likeDAO->likeComment($commentId, $userId);
    }

    public function unlikeComment(int $commentId, int $userId): bool
    {
        $likeDAO = LikeDAO::getInstance();
        return $likeDAO->unlikeComment($commentId, $userId);
    }

    public function isLikedBy(int $reader_id, int $target_id): bool{
        $likeDAO = LikeDAO::getInstance();
        return $likeDAO->isLikedBy($reader_id, $target_id);
    }
}