<?php

namespace App\Services;

use App\DAOs\UserDAO;
use App\Repositories\AdminRepository;

class AdminService{
    private static ?AdminService $instance = null;

    private function __construct() {}

    public static function getInstance(): AdminService{
        if(self::$instance === null){
            self::$instance = new AdminService();
        }

        return self::$instance;
    }

    public function getAll(): ?array{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->getAll();
    }

    public function getUsersCount(): ?int{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->getUsersCount();
    }

    public function getRecentActivities(): ?array{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->getRecentActivities();
    }

    public function banUser(int $id, int $reportId): bool{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->banUser($id, $reportId);
    }

    public function blacklistUser(int $id, int $reportId): bool{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->blacklistUser($id, $reportId);
    }

    public function timeoutUser(int $id, int $reportId, string $timeoutDuration): bool{
        $adminRepository = AdminRepository::getInstance();

        $duration = 0;

        if(str_contains($timeoutDuration,"min")){
            $duration = (int) str_replace("min","", $timeoutDuration) * 60;
        }else{
            $duration = (int) str_replace("h","", $timeoutDuration) * 3600;
        }

        $now = time();

        return $adminRepository->timeoutUser($id, $reportId, date('Y-m-d H:i:s', $now + $duration));
    }

    public function suspendUser(int $id, int $reportId, string $suspendDuration): bool{
        $adminRepository = AdminRepository::getInstance();

        $duration = (int) str_replace('d','', $suspendDuration) * 24 * 3600;

        $now = time();

        return $adminRepository->suspendUser($id, $reportId, date('Y-m-d H:i:s', $now + $duration));
    }

    public function unbanUser(int $id): bool{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->unbanUser($id);
    }

    public function unblacklistUser(int $id): bool{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->unblacklistUser($id);
    }

    public function untimeoutUser(int $id): bool{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->untimeoutUser($id);
    }

    public function unsuspendUser(int $id): bool{
        $adminRepository = AdminRepository::getInstance();
        return $adminRepository->unsuspendUser($id);
    }
}