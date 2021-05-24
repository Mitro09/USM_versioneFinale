<?php
namespace sarassoroberto\usm\model;

use sarassoroberto\usm\config\local\AppConfig;

class DB {
    public static function getConnection()
    {
        try {
            $conn = new \PDO('mysql:dbname='.AppConfig::DB_NAME.';host='.AppConfig::DB_HOST, AppConfig::DB_USER, AppConfig::DB_PASSWORD);
            $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $conn; 
        } catch (\PDOException $e) {

            throw $e;
        }
    }

    
    public static function serverConnectionWithoutDatabase()
    {
        try {
            
            $conn = new \PDO('mysql:host='.AppConfig::DB_HOST, AppConfig::DB_USER, AppConfig::DB_PASSWORD);
            $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}