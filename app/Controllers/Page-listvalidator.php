<?php namespace App\Controllers;

class Page extends BaseController
{
	
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
	public function contact()
	{
		if($this->request->getMethod() == 'post'){
			/*var_dump($this->request->getPost());
			exit;*/
			// Validation
			if(!$this->validate([
				'name' =>'required',
				'email' =>'required|valid_email',
				'message' =>'required',
			])){
				// var_dump($this->validator->getErrors());
				// var_dump($this->validator->listErrors());
				// exit;
				// $data['validator'] = $this->validator->listErrors();
				$validator = $this->validator->listErrors('my_list');
			}
		}
		$data = [
			'validator' => isset($validator) ? $validator : NULL,
			'email' => 'sms200sms@gmail.com',
			'title' => 'Contact Us',
			'c_f' => [
				'form_open' => form_open('/contact'),
				'name'=>form_input(['type' => 'text', 'name' => 'name', 'class' => 'form-control']),
				'email'=>form_input(['type' => 'text', 'name' => 'email', 'class' => 'form-control']),
				'message'=> form_textarea(['name' => 'message', 'class' => 'form-control', 'rows' => 4]),
				'form_submit'=> form_submit(['value' => 'Contact Us', 'name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']),
			]
		];
		echo view('contact',$data);
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
