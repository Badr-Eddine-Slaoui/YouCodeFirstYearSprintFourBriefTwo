<?php

namespace App\Repositories;

use App\DAOs\ArticleCategoryDAO;
use App\DAOs\ArticleDAO;
use App\DAOs\AuthorDAO;
use App\DAOs\CategoryDAO;
use App\DAOs\CommentDAO;
use App\DAOs\LikeDAO;
use App\DAOs\ReaderDAO;
use App\Mappers\ArticleMapper;
use App\Mappers\AuthorMapper;
use App\Mappers\CategoryMapper;
use App\Mappers\CommentMapper;
use App\Mappers\ReaderMapper;
use App\Models\Article;
use App\ViewModels\Article as ViewModelsArticle;
use Core\Database\Database;
use PDOException;

class ArticleRepository{
    private static ?ArticleRepository $articleRepository = null;
    private function __construct() {}

    public static function getInstance(): ArticleRepository{
        if (self::$articleRepository === null) {
            self::$articleRepository = new ArticleRepository();
        }

        return self::$articleRepository;
    }

    public function findAll(): ?array{
        $articleDAO = ArticleDAO::getInstance();
        $categoryDAO = CategoryDAO::getInstance();
        $commentDAO = CommentDAO::getInstance();
        $authorDAO = AuthorDAO::getInstance();
        $readerDAO = ReaderDAO::getInstance();
        $likeDAO = LikeDAO::getInstance();
        $readerMapper = ReaderMapper::getInstance();
        $authorMapper = AuthorMapper::getInstance();
        $articleMapper = ArticleMapper::getInstance();
        $categoryMapper = CategoryMapper::getInstance();
        $commentMapper = CommentMapper::getInstance();

        $rows = $articleDAO->getAll();

        if($rows){
            $articles = [];

            foreach ($rows as $article) {
                $categoriesData = $categoryDAO->findByArticle($article['id']);

                $comments = $commentDAO->getByArticleId($article['id']);

                $author = $authorDAO->findById($article['author_id']);

                $isLiked = $likeDAO->isLikedBy(session()->get('user_id'), $article['id']);
                $article["is_liked_by_current_user"] = $isLiked;

                if($comments){
                    foreach ($comments as $key => $comment) {
                        $is_liked = $likeDAO->isLikedBy(session()->get('user_id'), $comment['id']);
                        $reader = $readerDAO->findById($comment['reader_id']);
                        $comment['is_liked_by_current_user'] = $is_liked;
                        $comment['reader'] = $readerMapper->map($reader);
                        $comments[$key] = $comment;
                    }

                    $comments = $commentMapper->toCommentsView($comments);
                }else{
                    $comments = [];
                }

                $categories = $categoryMapper->mapMany($categoriesData);
                $author = $authorMapper->map($author);
                
                $articles[] = $articleMapper->toArticleView(
                    $article,
                    $categories,
                    $comments,
                    $author
                );
            }
            return $articles;
        }
        return null;
    }

    public function findByAuthor(int $authorId): ?array
    {
        $articleDAO = ArticleDAO::getInstance();
        $categoryDAO = CategoryDAO::getInstance();
        $articleMapper = ArticleMapper::getInstance();
        $categoryMapper = CategoryMapper::getInstance();

        $rows = $articleDAO->findByAuthor($authorId);

        if($rows){
            $articles = [];

            foreach ($rows as $row) {
                $categoryRows = $categoryDAO->findByArticle($row['id']);

                if(!$categoryRows){
                    return null;
                }

                $categories = $categoryMapper->mapMany($categoryRows);

                $articles[] = $articleMapper->map($row, $categories);
            }

            return $articles;
        }

        return null;
    }

    public function findById(int $id): ?Article{
        $articleDAO = ArticleDAO::getInstance();
        $categoryDAO = CategoryDAO::getInstance();
        $articleMapper = ArticleMapper::getInstance();
        $categoryMapper = CategoryMapper::getInstance();

        $row = $articleDAO->findById($id);

        if($row){
            $categoryRows = $categoryDAO->findByArticle($row['id']);

            if(!$categoryRows){
                return null;
            }

            $categories = $categoryMapper->mapMany($categoryRows);

            return $articleMapper->map($row, $categories);
        }

        return null;
    }

    public function getWithRelations(int $id): ?ViewModelsArticle{
        $articleDAO = ArticleDAO::getInstance();
        $categoryDAO = CategoryDAO::getInstance();
        $commentDAO = CommentDAO::getInstance();
        $authorDAO = AuthorDAO::getInstance();
        $readerDAO = ReaderDAO::getInstance();
        $likeDAO = LikeDAO::getInstance();
        $readerMapper = ReaderMapper::getInstance();
        $authorMapper = AuthorMapper::getInstance();
        $articleMapper = ArticleMapper::getInstance();
        $categoryMapper = CategoryMapper::getInstance();
        $commentMapper = CommentMapper::getInstance();

        $article = $articleDAO->findById($id);

        $categoriesData = $categoryDAO->findByArticle($article['id']);

        $comments = $commentDAO->getByArticleId($article['id']);

        $author = $authorDAO->findById($article['author_id']);

        $isLiked = $likeDAO->isLikedBy(session()->get('user_id'), $article['id']);
        $article["is_liked_by_current_user"] = $isLiked;

        if($comments){
            foreach ($comments as $key => $comment) {
                $is_liked = $likeDAO->isLikedBy(session()->get('user_id'), $comment['id']);
                $reader = $readerDAO->findById($comment['reader_id']);
                $comment['is_liked_by_current_user'] = $is_liked;
                $comment['reader'] = $readerMapper->map($reader);
                $comments[$key] = $comment;
            }

            $comments = $commentMapper->toCommentsView($comments);
        }else{
            $comments = [];
        }

        $categories = $categoryMapper->mapMany($categoriesData);
        $author = $authorMapper->map($author);
        
        return $articleMapper->toArticleView(
            $article,
            $categories,
            $comments,
            $author
        );
        
    }

    public function create(array $articleData, array $categoryIds): bool
    {
        $db = Database::getInstance();
        $articleDAO = ArticleDAO::getInstance();
        $pivotDAO = ArticleCategoryDAO::getInstance();

        try {
            $db->beginTransaction();

            $articleId = $articleDAO->insert($articleData);
            if($articleId){
                $status = $pivotDAO->attachCategories($articleId, $categoryIds);
                if(!$status){
                    return false;
                }
            }

            $db->commit();

            return true;

        } catch (PDOException $ex) {
            $db->rollBack();
            return false;
        }
    }

    public function update(int $id, array $articleData, array $categoryIds): bool
    {
        $db = Database::getInstance();
        $articleDAO = ArticleDAO::getInstance();
        $pivotDAO = ArticleCategoryDAO::getInstance();

        try {
            $db->beginTransaction();

            $status = $articleDAO->update($id, $articleData);
            if(!$status){
                return false;
            }

            $status = $pivotDAO->detachCategories($id);
            if(!$status){
                return false;
            }

            $status = $pivotDAO->attachCategories($id, $categoryIds);
            if(!$status){
                return false;
            }

            $db->commit();

            return true;

        } catch (PDOException $ex) {
            $db->rollBack();
            return false;
        }
    }

    public function delete(int $id): bool{
        $articleDAO = ArticleDAO::getInstance();
        return $articleDAO->delete($id);
    }
}