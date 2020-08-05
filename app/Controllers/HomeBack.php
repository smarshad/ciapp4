<?php namespace App\Controllers;

// use Config\Database;
use App\Models\UserModel;

class Home extends BaseController
{
	// private $db;
	// public function __construct(){
	// 	$this->db = Database::connect();
	// }

	public function __construct(){
		helper(['text','mytext']);
	}
	
	
	public function index()
	{
		
		/*Standard Query*/
		/*$query = $this->db->query("SELECT * FROM users");
		$result =  	$query->getResult();*/

		/*Query Builder Example*/

		$query = $this->db->table('users')->get();
		$result= $query->getRow();

		// echo $this->db->getPlatform();
		// echo '<br />';
		// echo '<br />';
		// echo $this->db->getVersion();
		

		// Types of include models

		// 1.	$usermodule = new \App\Models\UserModel(); // With full namespace By using this then we don’t need to use use Config\Database

		// 2.	$usermodule = model(‘ App\Models\UserModel ’, false); // false means its create new user class and return it, whenever this code is executed.
		// 3.	$usermodule = model(‘ App\Models\UserModel ’); // This time its uses share class (willlater discuss)
		// 4.	$usermodule = new UserModel(); // for this we have to include use App\Models\UserModel.

		// echo '<pre>';
		// print_r($result);
		// echo '<pre />';
		
		$usermodel = new UserModel();

		// Insert 
		$data = [
			'username' => 'admin',
			'password' => password_hash('admin', PASSWORD_DEFAULT),
			'email'	   => 'admin@admin.com'
		];

		
		$text = "<span class='st'><em>Lorem ipsum</em>, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</span>";
		// $words = character_limiter($text,30);
		$data['words'] = $text;

		$data['title'] = 'Home';
		// echo $words;
		// echo WRITEPATH;
		$this->session->set('name','S M arshad');
		$this->session->remove('name');
		echo view('welcome_message',$data);
	}

	//--------------------------------------------------------------------

}
