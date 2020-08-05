<?php 

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfileModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController {

    private $userModel    = null;
    private $profileModel = null;

    public function __construct(){
        $this->userModel    = new UserModel();
        $this->profileModel = new ProfileModel();
    }

    public function register()
    {        
        $this->userModel->transBegin();
        if(!$this->userModel->insert($this->request->getPost())){
            $this->session->setFlashData('errors', $this->userModel->errors());
            return redirect()->to('register')->withInput();
        }

        $this->userModel->transCommit();
        $this->session->setFlashData('message','User Successfully Registered');
        return redirect()->to('login');

    }

    public function login()
    {
        // print_r($this->request->getPost());
        // exit;
        $user = $this->userModel->authenticate($this->request->getPost());

        if($user){
            $session = array('id' => $user->id, 'email' => $user->email, 'username' => $user->username ,'isLoggedin' => true);
            $this->session->set('user',$session);
            $this->session->setFlashData('message', 'LoggedIn Successfully');
            return redirect()->to('home');
        }else{
            $this->session->setFlashData('error', 'Invalid Username Of Password');
            return redirect()->to('login')->withInput();
        }
    }
    
    public function profile($id){
        $profile = $this->userModel->join('profiles','profiles.user_id = users.id','left')->find($id);
        // print $this->db->getLastQuery();exit;
        // $profile = $this->profileModel->where('user_id', $id)->first();
        if(!$profile){
            throw PageNotFoundException::forPageNotFound("User Not Found!");
            
        }
        /*echo '<pre>';
        print_r($profile);
        echo '</pre>';exit;*/
        $data['title'] = 'User Profile';
        $data['user']  = $profile;
        return view('profile', $data);
    }


    public function update($id = null){
        // print_r($this->request->getPost());
        $profile = $this->profileModel->find($id);
        if(!$profile || ($profile['user_id'] != $this->session->get('user')['id'])){
            $this->session->setFlashData('error', "You can not update this User");
            return redirect()->back()->withInput();
        }

        // print $this->db->getLastQuery();exit;
        if($id != null){
            if(!$this->profileModel->update($id, $this->request->getPost())){
                $this->session->setFlashData('errors', $this->profileModel->errors());
                return redirect()->back()->withInput();
            }
            // print $this->db->getLastQuery();exit;
            $this->session->setFlashdata('message','Profile Successfully Updated');
            return redirect()->to(base_url().'/user/'.$id.'/profile');
        }else{
            $this->session->setFlashdata('error','User Id Missing');
        }

    }

    public function logout(){
        $this->session->destroy();
        $this->session->setFlashdata('message','Logout Successfully');
        return redirect()->to('login');
    }

}