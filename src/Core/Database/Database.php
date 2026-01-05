<?php

namespace Core\Database;

use PDO;
use PDOException;

class Database extends PDO
{
    public static ?PDO $instance = null;
    public function __construct() {
        try{
            
            require __DIR__ ."/../Helpers/env.php";

            require __DIR__ . '/../../config/database.php';

            if (!$driver || !$host || !$port || !$user || !$pass || !$dbname) {
                echo 'Missing environment variables';
            }

            $dsn = '';

            switch ($driver) {
                case 'pgsql':
                    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
                    break;
                case 'mysql':
                    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
                    break;
                default:
                    echo 'Invalid database driver';
                    break;
            }

            parent::__construct($dsn, $user, $pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getInstance(): self{
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}