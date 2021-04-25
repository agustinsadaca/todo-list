<?php namespace App\Models;

use CodeIgniter\Model;

class TaskModelApi extends Model
{
    protected $table      = 'a_task';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

   
    public function getTask(){

        $db = \Config\Database::connect();
    
        $getTask = $db->query("SELECT * FROM `a_task` ");
  
        $getTask = $getTask->getResultObject();
      
        
        return $getTask;
    }
   
  
}
