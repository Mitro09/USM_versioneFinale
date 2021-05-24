<?php
namespace sarassoroberto\usm\services;

use sarassoroberto\usm\model\UserModel;



class UserSession{

    public function __construct()
    {
        session_start();
    }

    public function checkLogin(string $email, string $password){
        $um = new UserModel();
        if($um->checkLogin($email,$password)){
            $user = $um->readDataLogin($email);
            $_SESSION['user_autenticated'] = $user;
            return $user;
        }
        else{
            /*$_SESSION['user_autenticated']= $user;
            return $user;*/
            $this->logOut();
        }
    }


    public function isAutenticated(){
        if(isset($_SESSION['user_autenticated'])){
            return true;
        }
        else{
            return false;
        }
    }

    public function logOut(){
        unset($_SESSION['user_autenticated']);
    }
}