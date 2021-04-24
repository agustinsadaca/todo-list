<?php 

namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{


    protected $table      = 'a_user';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['username','password','delete'];
 
    public function getUser($user,$password){
        $db = \Config\Database::connect();
		$sql = 'SELECT a_user.username,a_user.password,a_user.id
		FROM a_user 
		WHERE username = "'.$user.'" AND password = "'.$password.'"';

        $query = $db->query($sql);
     
        $results = $query->getRowArray();
        if(!isset($results)){

            $results = array();
            $results['username'] = null;
        }
        return $results;


    }
    public function uservalidate($user,$password)
    {   
       
        $users = $this->where('username',$user)->where('password',$password)->findAll();
      
        return $users;
    }

}