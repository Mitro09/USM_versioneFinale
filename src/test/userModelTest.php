<?php
use sarassoroberto\usm\model\UserModel;
include "./__autoload.php";

$userModel = new UserModel();
$userModel->readAll();