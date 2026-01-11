<?php

namespace App\Repositories;

use App\DAOs\ReportDAO;
use App\DAOs\UserDAO;
use App\Mappers\ActivityMapper;
use App\Mappers\InteractionMapper;
use App\Mappers\UsersMapper;

class AdminRepository{
    private static ?AdminRepository $instance = null;

    private function __construct() {}

    public static function getInstance(): AdminRepository{
        if(self::$instance === null){
            self::$instance = new AdminRepository();
        }

        return self::$instance;
    }

    public function getAll(): ?array{
        $userDAO = UserDAO::getInstance();
        $userMapper = UsersMapper::getInstance();

        $usersData = $userDAO->findAll();

        if(!is_null($usersData)){
            return $userMapper->mapMany($usersData);
        }

        return null;
    }

    public function getUsersCount(): ?int{
        $userDAO = UserDAO::getInstance();
        return $userDAO->getCount();
    }

    public function getRecentActivities(): ?array{
        $userDAO = UserDAO::getInstance();
        $activityMapper = ActivityMapper::getInstance();

        $rows = $userDAO->getRecentActivities();

        if(!is_null($rows)){
            return $activityMapper->map($rows);
        }

        return null;
    }

    public function banUser(int $id, int $reportId): bool{
        $userDAO = UserDAO::getInstance();

        if($userDAO->banUser($id)){
            return $this->resolveReport($reportId);
        }

        return false;
    }

    public function blacklistUser(int $id, int $reportId): bool{
        $userDAO = UserDAO::getInstance();
        
        if($userDAO->blacklistUser($id)){
            return $this->resolveReport($reportId);
        }

        return false;
    }

    public function timeoutUser(int $id, int $reportId, string $timeoutDuration): bool{
        $userDAO = UserDAO::getInstance();
        
        if($userDAO->timeoutUser($id, $timeoutDuration)){
            return $this->resolveReport($reportId);
        }

        return false;
    }

    public function suspendUser(int $id, int $reportId, string $suspendDuration): bool{
        $userDAO = UserDAO::getInstance();

        if($userDAO->suspendUser($id, $suspendDuration)){
            return $this->resolveReport($reportId);
        }

        return false;
    }

    public function unbanUser(int $id): bool{
        $userDAO = UserDAO::getInstance();
        return $userDAO->unbanUser($id);
    }

    public function unblacklistUser(int $id): bool{
        $userDAO = UserDAO::getInstance();
        return $userDAO->unblacklistUser($id);
    }

    public function untimeoutUser(int $id): bool{
        $userDAO = UserDAO::getInstance();
        return $userDAO->untimeoutUser($id);
    }

    public function unsuspendUser(int $id): bool{
        $userDAO = UserDAO::getInstance();
        return $userDAO->unsuspendUser($id);
    }

    private function resolveReport(int $reportId): bool{
        $reportDAO = ReportDAO::getInstance();
        return $reportDAO->resolveReport($reportId);
    }
}