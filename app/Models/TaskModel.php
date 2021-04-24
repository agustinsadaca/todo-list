<?php namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table      = 'a_task';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function setTask($stateparameter,$idFolder){
       
        $idFolder = intval($idFolder);
        $db = \Config\Database::connect();
        $taskInsertedId = intval($stateparameter->insertId);

        $setIdFolder = $db->query("UPDATE `a_task` SET `id_folder`=$idFolder WHERE `id`=$taskInsertedId");
    
        return true;
    }
    public function getFolderName($idFolder){

        $db = \Config\Database::connect();
    
        $getFolderId = $db->query("SELECT `name` FROM `a_folder_task` WHERE `id`=$idFolder");
        try {
            $getFolderId = $getFolderId->getResultObject()[0]->name;
        } catch (\Throwable $th) {
            return null;
        }
        
        
        return $getFolderId;
    }
    public function saveCheck($name,$checked,$folder=null){

        $db = \Config\Database::connect();
      
        if($checked=="true")
        {
            $checked = 1;
        }else{
           
            $checked = 0;
        }
        var_dump($name);
        var_dump($checked);
        var_dump($folder);
        
        if(isset($folder)){
            $getFolderId = $db->query("SELECT `id` FROM `a_folder_task` WHERE `name`='$folder'");
            $folder =  intval($getFolderId->getResultObject()[0]->id);

            $updateStateTask = $db->query("UPDATE `a_task` SET `check`=$checked WHERE `name`='$name' AND `id_folder`= $folder");
          
        }else{
            $updateStateTask = $db->query("UPDATE `a_task` SET `check`=$checked WHERE `name`='$name' AND `id_folder`= '$folder'");
        }
     
        return ;
    }
    public function deleteFolderItems($folderParameters)
    {
        $db = \Config\Database::connect();
        $folderId = intval($folderParameters->primaryKeyValue);
        $deleteFolderItems = $db->query("DELETE FROM `a_task` WHERE `id_folder`= $folderId");
        return;
    }
  
}
