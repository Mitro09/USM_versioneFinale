<?php

use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\services\UserSession;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
use sarassoroberto\usm\validator\LoginValidation;
use sarassoroberto\usm\validator\UserValidation;

require "./__autoload.php";


$action = './login_form.php';
$submit = 'Accedi';

if($_SERVER['REQUEST_METHOD']==='GET'){
    
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $us = new UserSession();
    $usermodel = new UserModel();
    $email = $_POST['email'];
    $password = $_POST['password'];
    /*var_dump($email);
    if($usermodel->checkEmail($email)){
        print_r("trovata");
    }
    else{
        print_r("NO");
    }*/
    $val = new LoginValidation($email,$password);
    $emailValidation = $val->getError('email');
    $passwordValidation = $val->getError('password');

    list($email, $emailClass, $emailClassMessage, $emailMessage) = ValidationFormHelper::getValidationClass($emailValidation);
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getValidationClass($passwordValidation);
    //var_dump($_POST);
    if ($usermodel->checkLogin($email,$password)) {
        // TODO
        header('location: ./login.html');
    }
}

include "./src/view/login_form_view.php";