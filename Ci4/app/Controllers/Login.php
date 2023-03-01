<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\UserModel;
 
class Login extends BaseController
{
    public function index()
    {
        helper (['form']);
        echo view('template/auth_header');
        return view('admin/login');
        echo view('template/auth_footer');
        
    } 
   
    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();
 
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
         
        $user = $userModel->where('email', $email)->first();
 
        if(is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Email not found!');
        }
 
        $pwd_verify = password_verify($password, $user['password']);
 
        if(!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }
 
        $ses_data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'isLoggedIn' => TRUE
        ];
 
        $session->set($ses_data);
        return redirect()->to('/');
         
        
    }
 
    public function logout() {
        session_destroy();
        return redirect()->to('/login');
    }
}