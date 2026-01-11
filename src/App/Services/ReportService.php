<?php

namespace App\Services;

use App\Repositories\ReportRepository;
use Core\Helpers\Validator;

class ReportService{
    private static ?ReportService $instance = null;

    private function __construct() {}

    public static function getInstance(): ReportService{
        if(self::$instance === null){
            self::$instance = new ReportService();
        }

        return self::$instance;
    }

    public function getAll(): ?array{
        $reportRepository = ReportRepository::getInstance();
        return $reportRepository->findAll();
    }

    public function reportArticle(int $articleId, int $userId, string $reportReason): bool
    {
        if(!Validator::report(["message" => $reportReason])){
            return false;
        }
        
        $reportRepository = ReportRepository::getInstance();
        return $reportRepository->reportArticle($articleId, $userId, $reportReason);
    }

    public function unreportArticle(int $articleId, int $userId): bool
    {
        $reportRepository = ReportRepository::getInstance();
        return $reportRepository->unreportArticle($articleId, $userId);
    }

    public function reportComment(int $commentId, int $userId, string $reportReason): bool
    {
        if(!Validator::report(["message" => $reportReason])){
            return false;
        }
        
        $reportRepository = ReportRepository::getInstance();
        return $reportRepository->reportComment($commentId, $userId, $reportReason);
    }

    public function unreportComment(int $commentId, int $userId): bool
    {
        $reportRepository = ReportRepository::getInstance();
        return $reportRepository->unreportComment($commentId, $userId);
    }

    public function isReportedBy(int $reader_id, int $target_id): bool{
        $reportRepository = ReportRepository::getInstance();
        return $reportRepository->isReportedBy($reader_id, $target_id);
    }

    public function resolvedCount(): ?int{
        $reportRepository = ReportRepository::getInstance();
        return $reportRepository->resolvedCount();
    }

    public function pendingCount(): ?int{
        $reportRepository = ReportRepository::getInstance();
        return $reportRepository->pendingCount();
    }
}