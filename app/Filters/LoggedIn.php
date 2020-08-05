<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
// use Config\Services;

class LoggedIn implements FilterInterface{
	
	public function before(RequestInterface $request, $arguments = null){
		// $session = Services::session();
		/*echo '<pre>';
		print_r($session);
		echo '</pre>';*/
		// echo 'dadsad';exit;
		// $user = $session->get('user') ?? null;
		$user = session()->get('user') ?? null;
		if(!$user ){			
			session()->setFlashData('message','Your Not LoggedIn If');
			return redirect()->to(base_url().'/login');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){

	}

	//--------------------------------------------------------------------
}
