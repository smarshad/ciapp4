<?php namespace App\Controllers;

class Home extends BaseController
{

	/*public function __construct(){
		helper(['text','mytext']);
	}*/
	
	//--------------------------------------------------------------------

	public function index()
	{
		$data['title'] = 'Home';
		echo view('welcome_message',$data);
	}

	//--------------------------------------------------------------------

}