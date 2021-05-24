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
        return $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,Hobby::class,['','']);

    }

    public function readOneHobby($interesse){
        $sql = 'SELECT * from interessi where nomeInteresse = :interesse';
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue('interesse',$interesse,PDO::PARAM_STR);
        $pdostm->execute();
        $result = $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,Hobby::class,['','']);
        return count($result) === 0 ? null : $result[0];
    }

    public function addHobby(User $user, Hobby $hobby){
        try{
        $pdostm = $this->conn->prepare('CREATE table if not exists User_Interessi (
                                            userId int(10),
                                            interessiId int(10),
                                            FOREIGN KEY (userId) REFERENCES User(userId),
                                            FOREIGN KEY (interessiId) REFERENCES Interessi(InteressiId));
                                        
                                        INSERT INTO User_Interessi (userId,interessiId)
                                        VALUES (:userId,:interessiId);');
        $pdostm->bindValue(':userId',$user->getUserId(),PDO::PARAM_INT);
        $pdostm->bindValue(':interessiId',$hobby->getInteressiId(),PDO::PARAM_INT);
        $pdostm->execute();
        }
        catch (\PDOException $e) {
            // TODO: Evitare echo
            echo $e->getMessage();

        }

    }
}