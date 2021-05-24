<?php

use entity\User;

spl_autoload_register(function($className){
    echo "sto cercando la classe $className\n\n";
    //DIRECTORY_SEPARATOR
    require __DIR__."/../$className.php";
    

});


$user = new User('Roby','Rossi','a@b.it','2020-01-01');
//$val = new UserValidation($user);

//$task = new Task;
print_r($user);