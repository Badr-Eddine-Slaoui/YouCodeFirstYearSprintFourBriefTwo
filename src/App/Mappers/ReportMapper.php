<?php

namespace App\Mappers;

use App\ViewModels\Report;

class ReportMapper
{
    private static ?ReportMapper $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): ReportMapper
    {
        if (self::$instance === null) {
            self::$instance = new ReportMapper();
        }

        return self::$instance;
    }

    public function toReportsView(array $reports):array{
        return array_map(
            fn($report) => new Report(
                $report['id'],
                $report['user_id'],
                $report['first_name'],
                $report['last_name'],
                $report['content'],
                $report['reason'],
                $report['status'],
                $report['created_at'],
                $report['type']
            ),
            $reports
        );
    } 
}