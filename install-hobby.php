<?php
require './__autoload.php';
use sarassoroberto\usm\config\local\AppConfig;
use sarassoroberto\usm\model\DB;

$conn = DB::serverConnectionWithoutDatabase();
$dbname = AppConfig::DB_NAME;

$sql = "use $dbname;

       CREATE table if not exists Interessi (
           InteressiId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
           nomeInteresse varchar(255) NOT NULL,
           UNIQUE INDEX nomeInteresse(nomeInteresse)
        )";
$conn->exec($sql);

$sqlToInsert = "INSERT INTO Interessi (InteressiId,nomeInteresse) VALUES (1,'Teatro');
                INSERT INTO Interessi (InteressiId,nomeInteresse) VALUES (2,'Calcio');
                INSERT INTO Interessi (InteressiId,nomeInteresse) VALUES (3,'Basket');
                INSERT INTO Interessi (InteressiId,nomeInteresse) VALUES (4,'Videogiochi');
                INSERT INTO Interessi (InteressiId,nomeInteresse) VALUES (5,'Palestra');
                INSERT INTO Interessi (InteressiId,nomeInteresse) VALUES (6,'Lettura');";

try{
    $stm = $conn->prepare($sqlToInsert);
    $stm->execute();    
}
catch(\throwable $th){
    echo $th->getMessage();
}