<?php

namespace sarassoroberto\usm\model;
use \PDO;
use sarassoroberto\usm\config\local\AppConfig;
use sarassoroberto\usm\entity\Hobby;
use sarassoroberto\usm\entity\User;

class HobbyModel
{

    private $conn;
    
    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname='.AppConfig::DB_NAME.';host='.AppConfig::DB_HOST, AppConfig::DB_USER, AppConfig::DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // TODO: togliere echo
            echo $e->getMessage();
        }
    }

    public function readHobby(){
        $pdostm = $this->conn->prepare('SELECT * from interessi;');
        $pdostm->execute();
        $result= $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,Hobby::class,['','']);
        //print_r($result);
        return $result;

    }

    public function readOneHobby($interesse){
        $sql = 'SELECT * from interessi where nomeInteresse = :interesse';
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue('interesse',$interesse,PDO::PARAM_STR);
        $pdostm->execute();
        $result = $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,Hobby::class,['','']);
        return count($result) === 0 ? null : $result[0];
    }

    public function addHobby(int $userId, int $hobbyId){
        $hobbyModel = new HobbyModel();
        //$interesse = $hobbyModel->readOneHobby($hobby);
        $pdostm = $this->conn->prepare('INSERT INTO user_interessi (userId, interessiId) VALUES (:userId, :interessiId);');
        $pdostm->bindValue(':userId', $userId,PDO::PARAM_INT );
        $pdostm->bindValue(':interessiId', $hobbyId, PDO::PARAM_INT);
        $pdostm->execute();
    }
}