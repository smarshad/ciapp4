<?php  
namespace App\Models;

use CodeIgniter\Model;
use App\Models\ProfileModel; // Second Method

class UserModel extends Model{

	protected $table = 'users';
	protected $DBGroup = 'default';
	protected $allowedFields = ['first_name','last_name','username','password','email'];
	protected $useTimestamps =  true;
	protected $validationRules    = [
        'email'     	=> 'required|valid_email|is_unique[users.email]',
        'username'  	=> 'required|alpha_numeric|is_unique[users.username]|min_length[3]',
        'password'  	=> 'required|min_length[6]',
        'confpassword' 	=> 'required[password]|matches[password]',
    ];

	protected $validationMessages = [
		'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ],
        'username'      => [
            'is_unique' => 'Sorry. That username has already been taken. Please choose another.'
        ],'confpassword' =>[ 'required' => 'Password Confirmation is Required',
           'matches' => 'Password Confirmation does not match']
	];
	protected $beforeInsert 	  = ['hashPassword'];

	protected $afterInsert 	  	  = ['updateProfile']; // Second Method to insert into profile in usermodule use only if you want to insert through usermodel


    public function transBegin(){
    	return $this->db->transBegin();
    }

    public function transRollback(){
    	return $this->db->transRollback();
    }

    public function transCommit(){
    	return $this->db->transCommit();
    }

    // Use in First method
	/*    public function insertID(){
	    	return $this->db->insertID();
	    }
	*/
	// First method
    /*public function hashPassword($data){
    	$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    	return $data;
    }*/

    // Second method Start
    public function hashPassword($data){

    	// echo '<pre>';print_r($data);echo '</pre>';exit;

    	$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    	session()->set(['first_name' => $data['data']['first_name'], 'last_name' => $data['data']['last_name']]);
    	// var_dump($data);exit;
    	unset($data['data']['first_name']);
    	unset($data['data']['last_name']);
    	return $data;
    }

    public function updateProfile($data){
    	$ProfileModel = new ProfileModel();
    	$ProfileModel->insert(['user_id' => $data['id'] ,'first_name' => session('first_name'),'last_name' => session('last_name')]);	
    	session()->remove('first_name');
    	session()->remove('last_name');
    }

    // Second method End


    public function authenticate($user){
    	$password = $user['password'];
    	// 1st get user where email is post email
    	$user = $this->getWhere(['email' => $user['email']]);

    	// echo '<pre>'; print_r($user); echo '</pre>';exit;
    	
    	if($user->resultID->num_rows > 0){
    		// 2nd now get user row
    		$user = $user->getRow();
    		// 3rd Now verifiy password
    		$verify = password_verify($password, $user->password);
    		if($verify){
    			return $user;
    		}else{
    			return false;	
    		}
    	}else{
    		return false;
    	}
    }

}
