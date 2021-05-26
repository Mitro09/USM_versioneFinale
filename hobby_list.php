<?php

use sarassoroberto\usm\model\HobbyModel;

require "./__autoload.php";

$model = new HobbyModel();
include './src/view/hobby_list_view.php';