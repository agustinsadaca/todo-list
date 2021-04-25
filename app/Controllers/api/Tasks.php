<?php

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

require APPPATH . '/libraries/Format.php';

class Tasks extends REST_Controller {

    function __construct(){

		parent::__construct();

		$headers = array();

	}
    function task_get(){

		$query= $this->db->query('SELECT * FROM a_task;');
		$result = $query->result_object();

		if($result){
			$this->response($result, 200);
		}

	}
}

?>