<?php

namespace App\Mappers;

use App\ViewModels\Like;

class LikeMapper
{
    private static ?LikeMapper $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): LikeMapper
    {
        if (self::$instance === null) {
            self::$instance = new LikeMapper();
        }

        return self::$instance;
    }

    public function toLikesView(array $likes):array{
        return array_map(
            fn($like) => new Like(
                $like['id'],
                $like['article_id'],
                $like['reader_id'],
                $like['created_at'],
                $like['reader'],
                $like['article']
            ),
            $likes
        );
    } 
}