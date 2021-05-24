<?php

use sarassoroberto\usm\entity\User;

require './src/entity/User.php';
try {
    // READ / LIST
    $conn = new PDO('mysql:dbname=corso_formarete;host=localhost',
                    'root','');
    
    $stm = $conn->prepare('select * from User;');
    
    
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_CLASS,User::class); // UserFactory
    // new User() id 3 
    // new User() id 4
    // new User() 

    print_r($result);

} catch (\PDOException $e) {
    echo $e->getMessage()."\n";
}



