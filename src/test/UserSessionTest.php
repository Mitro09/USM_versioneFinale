<?php

use sarassoroberto\usm\services\UserSession;

require __DIR__."/../../__autoload.php";
require __DIR__."/../../vendor/testTools/testTool.php";

$us = new UserSession();

$user = $us->checkLogin('mpatrick94@libero.it','password');
print_r($user);
//assertEquals($user,$_SESSION['user_autenticated']);