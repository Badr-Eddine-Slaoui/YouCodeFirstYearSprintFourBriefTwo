<?php

namespace App\Repositories;

use App\DAOs\ReportDAO;
use App\Mappers\ReportMapper;

class ReportRepository{
    private static ?ReportRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): ReportRepository{
        if(self::$instance === null){
            self::$instance = new ReportRepository();
        }

        return self::$instance;
    }

    public function findAll(): ?array{
        $reportDAO = ReportDAO::getInstance();
        $reportMapper = ReportMapper::getInstance();

        $reportsData = $reportDAO->getAll();

        if(!is_null($reportsData)){
            $reports = $reportMapper->toReportsView($reportsData);
            return $reports;
        }

        return null;
    }

    public function reportArticle(int $articleId, int $userId, string $reportReason): bool
    {
        $reportDAO = ReportDAO::getInstance();
        return $reportDAO->reportArticle($articleId, $userId, $reportReason);
    }

    public function unreportArticle(int $articleId, int $userId): bool
    {
        $reportDAO = ReportDAO::getInstance();
        return $reportDAO->unreportArticle($articleId, $userId);
    }

    public function reportComment(int $commentId, int $userId, string $reportReason): bool
    {
        $reportDAO = ReportDAO::getInstance();
        return $reportDAO->reportComment($commentId, $userId, $reportReason);
    }

    public function unreportComment(int $commentId, int $userId): bool
    {
        $reportDAO = ReportDAO::getInstance();
        return $reportDAO->unreportComment($commentId, $userId);
    }

    public function isReportedBy(int $reader_id, int $target_id): bool{
        $reportDAO = ReportDAO::getInstance();
        return $reportDAO->isReportedBy($reader_id, $target_id);
    }
}