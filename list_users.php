<?php
require "./__autoload.php";
use sarassoroberto\usm\model\UserModel;

$model = new UserModel();
include './src/view/list_users_view.php';
?>
