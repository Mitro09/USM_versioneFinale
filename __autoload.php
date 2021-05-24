<?php

# esempi di trasformazione da $className a classPath
// sarassoroberto\usm\entity\User;
// src/entity/User.php

// sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
// src/validator/bootstrap/ValidationFormHelper.php;

# prima sostituisco il mio namespace 
// 1. sarassoroberto\usm --> src
// 2. \ --> DIRECTORY_SEPARATOR (\,/)

spl_autoload_register(function($className){
    $classPath = str_replace("sarassoroberto\usm",__DIR__."\src",$className);
    $classPath = str_replace("\\",DIRECTORY_SEPARATOR,$classPath).".php";
    //echo $classPath."<br>";
    require_once $classPath;      
});


