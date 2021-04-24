<?php

namespace App\Controllers;

use App\Libraries\GroceryCrud;
use CodeIgniter\Controller;
use App\Models\TaskModel;

class TaskList extends AdminLayout
{
	public function taskList($id=null)
	{       
		$crud = new GroceryCrud();
        
        $arrayColumns = [
            'check','name','id_folder'
        ];
        $arrayColumn = [
            'check','name','folderName'
        ];
	

        //// SETS GENERALES
		// $crud->fieldType('check','true_false');
        $crud->setTheme('datatables');
        $crud->setTable('a_task');
        $crud->setSubject('Task','Task');
        $crud->columns($arrayColumn);
        $crud->editFields($arrayColumns);
        $crud->fields($arrayColumns);  
		$crud->displayAs('name','Task Name');    
		$crud->displayAs('id','Task Number');    
		$crud->displayAs('check','Completed');    
		$crud->displayAs('id_folder','Folder');    
		$crud->fieldType('id', 'readonly');
		$crud->unsetAddFields(['folderName']);
		$crud->unsetEditFields(['folderName']);
		$crud->setRule('name','name','required'); 

		$data = array();
	
		if($id != 'add' AND $id != 'edit' AND intval($id) != null){
			$crud->where('id_folder',$id);
			$crud->callbackAfterInsert(function ($stateParameters) use ($id)
			{
			$taskModel = new TaskModel();
            $taskModel =  $taskModel->setTask($stateParameters,$id);
			return;
			});

			$taskModel = new TaskModel();
            $folderName =  $taskModel->getFolderName($id);
			$data['folder'] = $folderName;
			if ($crud->getState() == 'add') 
        	{
            $crud->fieldType('id_folder', 'hidden'); 
			}
		}else{
			$crud->setRelation('id_folder', 'a_folder_task', 'name');

		}

		$crud->callbackColumn('folderName', function ($value, $row)
        {
			$taskModel = new TaskModel();
            $folderName =  $taskModel->getFolderName($row->id_folder);
            return '<p>'.$folderName.'</p>';
        }); 

		if ($crud->getState() == 'add') 
        {
            $crud->fieldType('check', 'hidden'); 
            $crud->fieldType('id', 'hidden'); 
            $crud->fieldType('folderName', 'hidden'); 
        }
        if ($crud->getState() == 'edit') 
        {
            $crud->fieldType('check', 'hidden'); 
            $crud->fieldType('folderName', 'hidden'); 
       
        }

		$crud->callbackColumn('check', function ($value, $row) 
		{
			$taskModel = new TaskModel();
            if(($row->check)==1){
			return ' <input type="checkbox" class="completed checkbox" name="completed" value="completed" checked>';
			}else
			{
			return ' <input type="checkbox" class="completed checkbox" name="completed" value="completed">';	
			}
		});

		
        $data['grocery'] = $crud;
        $data['view'] = 'default.php';
        return $this->render($data);

	}
	public function taskFolder()
	{
		$crud = new GroceryCrud();
        
        $arrayColumns = [
            'id','name'
        ];
        //// SETS GENERALES
		// $crud->fieldType('check','true_false');
        $crud->setTheme('datatables');
        $crud->setTable('a_folder_task');
        $crud->setSubject('Folder Tasks','Folder Tasks');
        $crud->columns($arrayColumns);
        $crud->editFields($arrayColumns);
        $crud->fields($arrayColumns);  
		$crud->displayAs('name','Folder Name');    
		$crud->displayAs('id','Folder Number');    
		$crud->displayAs('check','Completed');    
		$crud->fieldType('id', 'readonly');
		if ($crud->getState() == 'add') 
        {
            $crud->fieldType('id', 'hidden'); 
          
        }
		$crud->callbackAfterDelete(function ($stateParameters) 
		{
			$taskModel = new TaskModel();
            $folderName =  $taskModel->deleteFolderItems($stateParameters);
			return;
		});

		$crud->setActionButton('View Items', 'view-items', function ($primaryKey) { 
			return site_url('/TaskList/taskList/' . $primaryKey); 
		}, false);
		$data = array();
        $data['grocery'] = $crud;
        $data['view'] = 'default.php';
        return $this->render($data);
	}
	public function saveCheck($name,$ckecked,$folder=null)
	{
		$ckeck = new TaskModel();
		$result =  $ckeck->saveCheck($name,$ckecked,$folder);
		return ;
	}
	

}
