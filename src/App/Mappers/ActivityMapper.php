<?php

namespace App\Mappers;

use App\ViewModels\Activity;

class ActivityMapper
{
    private static ?ActivityMapper $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): ActivityMapper
    {
        if (self::$instance === null) {
            self::$instance = new ActivityMapper();
        }

        return self::$instance;
    }

    public function map(array $activities):array{
        return array_map(
            fn($activity) => new Activity(
                $activity['id'],
                $activity['first_name'],
                $activity['last_name'],
                $activity['title'],
                $activity['created_at'],
                $activity['type']
            ),
            $activities
        );
    } 
}