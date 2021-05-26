<?php 
use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\HobbyModel;
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
use sarassoroberto\usm\validator\UserValidation;

require "./__autoload.php";
$action = './add_user_hobby.php';
$submit = 'Aggiungi Interesse';
$hobbyModel = new HobbyModel();

if ($_SERVER['REQUEST_METHOD']==='GET'){
    $userId = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
    print_r($userId);
}

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $hobby = $_POST['interessi'];
    //$hobbyModel->addHobby();
}

include "./src/view/add_user_hobby_view.php";