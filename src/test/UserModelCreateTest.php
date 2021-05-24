<?php
require __DIR__."/../entity/User.php"; 
require __DIR__."/../model/UserModel.php";

$model = new UserModel();
$user = new User('Vincenzo','Lanca','vl@email.com','1800-04-04');
$model->create($user);

