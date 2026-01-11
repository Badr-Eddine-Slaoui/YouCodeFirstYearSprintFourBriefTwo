<?php

namespace App\Repositories;

use App\DAOs\CommentDAO;
use App\DAOs\ReportDAO;
use App\DAOs\UserDAO;
use App\Mappers\CommentMapper;
use App\Mappers\ReaderMapper;

class CommentRepository{
    private static ?CommentRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): CommentRepository{
        if(self::$instance === null){
            self::$instance = new CommentRepository();
        }

        return self::$instance;
    }

    public function getCommentsCount(): ?int{
        $commentDAO = CommentDAO::getInstance();
        return $commentDAO->getCount();
    }

    public function getAll(): ?array{
        $commentDAO = CommentDAO::getInstance();
        $userDAO= UserDAO::getInstance();
        $articleRepository = ArticleRepository::getInstance();
        $readerMapper= ReaderMapper::getInstance();
        $commentMapper= CommentMapper::getInstance();

        $rows = $commentDAO->getAll();

        if(!is_null($rows)){
            foreach($rows as $key => $comment){
                $reader = $userDAO->findById($comment['reader_id']); 
                $comment['reader'] = $readerMapper->map($reader);
                $comment['article'] = $articleRepository->findById($comment['article_id']);
                $rows[$key] = $comment;
            }

            return $commentMapper->toCommentsView($rows);
        }

        return null;
    }

    public function getByArticle(int $articleId): ?array{
        $commentDAO = CommentDAO::getInstance();
        return $commentDAO->getByArticleId($articleId);
    }

    public function getByArticleAuthor(int $authorId): ?array{
        $commentDAO = CommentDAO::getInstance();
        $userDAO = userDAO::getInstance();
        $reportDAO = ReportDAO::getInstance();
        $articleRepository = ArticleRepository::getInstance();
        $readerMapper= ReaderMapper::getInstance();
        $commentMapper= CommentMapper::getInstance();

        $commentsData = $commentDAO->getByArticleAuthor($authorId);

        if(!is_null($commentsData)){
            foreach($commentsData as $key => $comment){
                $is_reported = $reportDAO->isReportedBy(session()->get('user_id'), $comment['id']);
                $comment['is_reported_by_current_user'] = $is_reported;
                $reader = $userDAO->findById($comment['reader_id']); 
                $comment['reader'] = $readerMapper->map($reader);
                $comment['article'] = $articleRepository->findById($comment['article_id']);
                $commentsData[$key] = $comment;
            }

            return $commentMapper->toCommentsView($commentsData);
        }

        return null;
    }

    public function getAuthorCommentsCount(int $authorId): ?int{
        $commentDAO = CommentDAO::getInstance();
        return $commentDAO->getAuthorCommentsCount($authorId);
    }

    public function getAuthorDailyCommentsCount(int $authorId): ?int{
        $commentDAO = CommentDAO::getInstance();
        return $commentDAO->getAuthorDailyCommentsCount($authorId);
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