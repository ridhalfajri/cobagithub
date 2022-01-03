<?php
namespace App\Controllers;

use App\Models\M_User;

class Register extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new M_user;
    }

    public function index()  
    {
        $data = [
            'judul' => 'Register C-Fruit',
        ];
        
        echo view('Login/register',$data);
    }

    public function doRegister()
    {
        $data = [
            'id_user' => '',
            'username' => $this->request->getPost('username'),
            'password'=> $this->request -> getPost('password')
            ];
        $cekdata = [
            'username' => $this->request->getPost('username'),
            'password'=> $this->request -> getPost('password'),
            'repeatpassword'=> $this->request -> getPost('repeatpassword')
            ];
        
        $userDat = $this->usermodel->getUserByUsername($cekdata["username"]);
        if(isset($userDat)){
            session()->setFlashdata('message','Username sudah ada');
            return redirect()->to(base_url('/register'));
        }
        else{
            
            if($cekdata["password"] == $cekdata["repeatpassword"] && $data){
                $success = $this->usermodel->addDataUser($data);
                if ($success) {
                    return redirect()->to(base_url('/'));
                }
                
            }else {
                session()->setFlashdata('message','Password tidak sama');
                return redirect()->to(base_url('/register'));
            }
        }    
    }
}