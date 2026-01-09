<?php

namespace App\Services;

use App\Repositories\LikeRepository;

class LikeService{
    private static ?LikeService $instance = null;

    private function __construct() {}

    public static function getInstance(): LikeService{
        if(self::$instance === null){
            self::$instance = new LikeService();
        }

        return self::$instance;
    }

    public static function getByAuthor(int $id){
        $likeRepository = LikeRepository::getInstance();
        return $likeRepository->getByArticleAuthor($id);
    }

    public function getAuthorLikesCount(int $authorId): ?int{
        $likeRepository = LikeRepository::getInstance();
        return $likeRepository->getAuthorLikesCount($authorId);
    }

    public function getAuthorDailyAvgLikesCount(int $authorId): ?int{
        $likeRepository = LikeRepository::getInstance();
        return $likeRepository->getAuthorDailyAvgLikesCount($authorId);
    }

    public function likeArticle(int $articleId, int $userId): bool
    {
        $likeRepository = LikeRepository::getInstance();
        return $likeRepository->likeArticle($articleId, $userId);
    }

    public function unlikeArticle(int $articleId, int $userId): bool
    {
        $likeRepository = LikeRepository::getInstance();
        return $likeRepository->unlikeArticle($articleId, $userId);
    }

    public function likeComment(int $commentId, int $userId): bool
    {
        $likeRepository = LikeRepository::getInstance();
        return $likeRepository->likeComment($commentId, $userId);
    }

    public function unlikeComment(int $commentId, int $userId): bool
    {
        $likeRepository = LikeRepository::getInstance();
        return $likeRepository->unlikeComment($commentId, $userId);
    }

    public function isLikedBy(int $reader_id, int $target_id, string $target_type): bool{
        $likeRepository = LikeRepository::getInstance();
        return $likeRepository->isLikedBy($reader_id, $target_id, $target_type);
    }
}