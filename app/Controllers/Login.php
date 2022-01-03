<?php
namespace App\Controllers;


use App\Models\M_User;

class Login extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new M_user;
    }
    public function index()
        {

            $data = [
                'judul' => 'Login C-Fruit',
            ];

            
            echo view('Login/login',$data);

        }

    public function doLogin(){
        
        // ambil nilai dari yang di input
        $data = [
            'username' => $this->request->getPost('username'),
            'password'=> $this->request -> getPost('password')
            ];
            
        //get data dari table user dengan param username
        $userDat = $this->usermodel->getUserByUsername($data["username"]);
        
        if(isset($userDat)){
            // check password
            if($data["password"] == $userDat["password"] && $data){
                return redirect()->to('/dashboard');
            }
            else{
                session()->setFlashdata('message','Password salah');
                return redirect()->to(base_url('/'));

            }
        }
        else{
            session()->setFlashdata('message','Username tidak ditemukan');
                return redirect()->to(base_url('/'));
        }

    }
}