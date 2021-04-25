<?php

namespace App\Controllers;
use App\Libraries\GroceryCrud;
use App\Models\FacturaModel;
use App\Models\TaskModelApi;
use CodeIgniter\Controller;

class TasksApi extends AdminLayout{
	
    function task_get(){

		$taks_get = new TaskModelApi();
		$result =  $taks_get->getTask();
		$result = json_encode($result);
		return $result;

	}
}

?>