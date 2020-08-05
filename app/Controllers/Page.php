<?php namespace App\Controllers;

class Page extends BaseController
{
	public function index()
	{
		return $this->login();
	}
	//--------------------------------------------------------------------
	// public function about()
	// {
	// 	$data = [
	// 		'name' => 'S M Arshad',
	// 		'title' => 'About Us'
	// 	];
	// 	echo view('include/header',$data);
	// 	echo view('about');
	// 	echo view('include/footer');
	// }

	//--------------------------------------------------------------------
	// public function contact()
	// {
	// 	$data = [
	// 		'email' => 'sms200sms@gmail.com',
	// 		'title' => 'Contact Us'
	// 	];
	// 	echo view('include/header',$data);
	// 	echo view('contact');
	// 	echo view('include/footer');
	// }
	
	//--------------------------------------------------------------------
	public function about()
	{
		$data = [
			'name' => 'S M Arshad',
			'title' => 'About Us'
		];
		
		echo view('about', $data);
	}

	//--------------------------------------------------------------------
	public function register()
	{
		$data = [
			'title' => 'Registeration'
		];
		
		return view('register', $data);
	}

	//--------------------------------------------------------------------
	public function login()
	{

		$data = [
			'title' => 'Login'
		];
		
		return view('login', $data);
	}
	//--------------------------------------------------------------------
	public function contact()
	{
		$email = \Config\Services::email();
		$data = array(
			'email' => 'smarshad86@gmail.com',
			'title' => 'Contact us',
			'validator' => null,
			'name' => $this->session->get('name','default')
		);
		if($this->request->getMethod() == 'post'){
			// Validation
			if(!$this->validate([
				'name' =>'required',
				'email' =>'required|valid_email',
				'message' =>'required|min_length[2]',
			])){
				$data['validator'] = $this->validator;
			}else{
				$email->setFrom($this->request->getPost('email'));
				$email->setTo('admin@admin.com');
				$email->setSubject('Test Subject');
				$email->setMessage($this->request->getPost('message'));
				$email->send();
				$this->session->setFlashData('message','Email Sent Successfully');
				return redirect()->to(base_url());
			}
		}
		$data['c_f'] = [
			'form_close' => form_close(),
			'form_open' => form_open('/contact'),
			'name'=>form_input(['type' => 'text', 'name' => 'name', 'class' => 'form-control']),
			'email'=>form_input(['type' => 'text', 'name' => 'email', 'class' => 'form-control']),
			'message'=> form_textarea(['name' => 'message', 'class' => 'form-control', 'rows' => 4]),
			'form_submit'=> form_submit(['value' => 'Contact Us', 'name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']),
		];
		echo view('contact', $data);
	}

	//--------------------------------------------------------------------
	public function testtemplate()
	{
		$data = [
			'name' => 'S M Arshad',
			'title' => 'testtemplate',
			'pagename' => 'Test page'
		];
		echo view('test',$data);
	}

	

	//--------------------------------------------------------------------

}
