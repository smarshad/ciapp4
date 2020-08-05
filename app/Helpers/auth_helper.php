<?php

use Config\Services;

if( !function_exists('loggediIn')){
	function loggediIn(){
		$session = Services::session();
		// $user = $session->get('user') ?? null;
		$user = $session->has('user') ? $session->get('user') : null;
		if($user){
			return true;
		}
		return false;
	}
}

if( !function_exists('allowEdit')){
	function allowEdit($username){
		$user = session()->has('user') ? session()->get('user') : null;
		// echo 'session : '.$user['username'].'<br />';
		// echo 'userss : '.$username;
		// exit;
		if($user['username'] === $username){
			return true;
		}
		return false;
	}
}

if( !function_exists('getSesionUserId')){
	function getSesionUserId(){
		$id = session()->get('user')['id'] ?? null;
		return $id;
	}
}