<?php

namespace App\Mappers;

use App\Models\Comment;
use App\Models\Reader;
use App\ViewModels\Comment as ViewModelsComment;

class CommentMapper
{
    private static ?CommentMapper $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): CommentMapper
    {
        if (self::$instance === null) {
            self::$instance = new CommentMapper();
        }

        return self::$instance;
    }

    public function mapAll(array $comments): array
    {
        return array_map(
            fn($comment) => new Comment(
                $comment['id'],
                $comment['article_id'],
                $comment['reader_id'],
                $comment['body'],
                $comment['created_at'],
                $comment['likes_count'] ?? 0
            ),
            $comments
        );
    }

    public function toCommentsView(array $comments):array{
        return array_map(
            fn($comment) => new ViewModelsComment(
                $comment['id'],
                $comment['article_id'],
                $comment['reader_id'],
                $comment['body'],
                $comment['created_at'],
                $comment['reader'],
                $comment['is_liked_by_current_user'],
                $comment['likes_count'] ?? 0
            ),
            $comments
        );
    } 
}