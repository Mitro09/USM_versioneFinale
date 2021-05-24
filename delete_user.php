<?php

use sarassoroberto\usm\model\UserModel;

require "./__autoload.php";

$userId = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);



if($userId){
    $user = new UserModel();
    $deleteSuccess = $user->delete($userId);


    echo "prima del redirect devo cancellare ";

    // if($deleteSuccess){
    //     echo "<br></nr>cancellato";
    // }else{
    //     echo "<br>non trovato";
    // }

  
    header("location: ./list_users.php");


}else{
    $invaliUserId = false;
}
