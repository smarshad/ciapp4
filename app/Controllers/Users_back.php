<?php 

namespace App\Controllers;

use App\Models\UserModel;
// use App\Models\ProfileModel; // In First Method

class Users extends BaseController {

    public function register()
    {
        $userModel    = new UserModel();
        // $profileModel = new ProfileModel(); // In First Method

        $userModel->transBegin();

        // First Method Insert 
            /*
            if(!$userModel->insert($this->request->getPost())){
                $this->session->setFlashData('errors', $userModel->errors());
                return redirect()->to('register')->withInput();
            }
            $pData = [
                'user_id' => $userModel->insertID(),
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
            ];

            if(!$profileModel->insert($pData)){
                $userModel->transRollback();
                $this->session->setFlashData('errors', $profileModel->errors());
                return redirect()->to('register');
            }*/

        // Second Method Here only one function we used

        if(!$userModel->insert($this->request->getPost())){
            $this->session->setFlashData('errors', $userModel->errors());
            return redirect()->to('register')->withInput();
        }

        $userModel->transCommit();
        $this->session->setFlashData('message','User Successfully Registered');
        return redirect()->to('login');

    }

    public function login()
    {

    }
    
}