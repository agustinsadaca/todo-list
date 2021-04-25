<?php

namespace App\Controllers;
use App\Libraries\GroceryCrud;

// include_once "cors.php";
include_once "TasksApi";

$result = task_get();
echo $result;


?>