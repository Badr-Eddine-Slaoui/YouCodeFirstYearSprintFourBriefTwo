<?php

namespace App\Repositories;

use App\DAOs\LikeDAO;
use App\DAOs\UserDAO;
use App\Mappers\LikeMapper;
use App\Mappers\ReaderMapper;

class LikeRepository{
    private static ?LikeRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): LikeRepository{
        if(self::$instance === null){
            self::$instance = new LikeRepository();
        }

        return self::$instance;
    }

    public function getByArticleAuthor(int $authorId): ?array{
        $likeDAO = LikeDAO::getInstance();
        $userDAO = UserDAO::getInstance();
        $articleRepository = ArticleRepository::getInstance();
        $readerMapper= ReaderMapper::getInstance();
        $likeMapper= LikeMapper::getInstance();

        $likesData = $likeDAO->getByArticleAuthor($authorId);

        if(!is_null($likesData)){
            foreach($likesData as $key => $like){
                $reader = $userDAO->findById($like['reader_id']); 
                $like['reader'] = $readerMapper->map($reader);
                $like['article'] = $articleRepository->findById($like['article_id']);
                $likesData[$key] = $like;
            }

            return $likeMapper->toLikesView($likesData);
        }

        return null;
    }

    public function getAuthorLikesCount(int $authorId): ?int{
        $likeDAO = LikeDAO::getInstance();
        return $likeDAO->getAuthorLikesCount($authorId);
    }

    public function getAuthorDailyAvgLikesCount(int $authorId): ?int{
        $likeDAO = LikeDAO::getInstance();
        return $likeDAO->getAuthorDailyAvgLikesCount($authorId);
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

    public function isLikedBy(int $reader_id, int $target_id, string $target_type): bool{
        $likeDAO = LikeDAO::getInstance();
        return $likeDAO->isLikedBy($reader_id, $target_id, $target_type);
    }
}