<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\UserModel;
 
class Register extends BaseController
{
 
    public function __construct(){
        helper(['form']);
    }
 
    public function index()
    {
        $data = [];
    
        echo view('template/auth_header');
        return view('admin/register', $data);
        echo view('template/auth_footer');
    }
   
    public function register()
    {
        helper (['form']);
        $rules = [
            'email'     => ['label' => 'Email', 'rules'    => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]', 'errors' => [ 'is_unique' => 'Email has been registered!', 'valid_email' => 'Type a valid email!'],],
            'username'  => ['label' => 'Username', 'rules' => 'required|min_length[4]', 'errors' => [ 'min_length' => 'Username too short!'],],
            'password1' => ['label' => 'Password', 'rules' => 'required|min_length[4]|max_length[255]', 'errors' => [ 'min_length' => 'Password too short!'],],
            'password2' => ['label' => 'Password', 'rules' => 'required|matches[password1]', 'errors' => [ 'matches' => 'Password doesnt match!'],]
        ];
           
 
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'email'    => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
                'images'   => 'images.jpg'
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('template/auth_header');
            return view('admin/register', $data);
            echo view('template/auth_footer');
        }
           
    }
}