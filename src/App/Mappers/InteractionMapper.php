<?php

namespace App\Mappers;

use App\ViewModels\Interaction;

class InteractionMapper
{
    private static ?InteractionMapper $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): InteractionMapper
    {
        if (self::$instance === null) {
            self::$instance = new InteractionMapper();
        }

        return self::$instance;
    }

    public function map(array $interactions):array{
        return array_map(
            fn($interaction) => new Interaction(
                $interaction['id'],
                $interaction['first_name'],
                $interaction['last_name'],
                $interaction['article_id'],
                $interaction['author_id'],
                $interaction['title'],
                $interaction['body'],
                $interaction['created_at'],
                $interaction['type']
            ),
            $interactions
        );
    } 
}