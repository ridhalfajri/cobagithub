<?php 
namespace App\Controllers;

use App\Models\M_User;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\user';

    public function __construct()
    {
        $this->user = new M_User();
    }
        

    public function index()
    {
        $users = $this->user->getUser();

        return $this->respond($users, 200);
    }
    
    public function create()
    {
        $id_user = $this->request->getPost('id_user');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = [
            'id_user' => $id_user
            ,'username' => $username
            ,'password' => $password
        ];
        
        $save  = $this->user->insertUser($data);
        if ($save == true) {
            $output =  [
                'status' => 200
                , 'message' => 'Berhasil menyimpan data'
                , 'data' => ''
            ];
            return $this->respond($output,200);
        }else {
            $output =  [
                'status' => 400
                , 'message' => 'Gagal menyimpan data'
                , 'data' => ''
            ];
            return $this->respond($output,400);
        }

    }

    public function show($id_user = null)
    {
        $users = $this->user->getUser($id_user);
        if (isset($users)) {
            $output =[
                'id_user' =>intval($users['id_user'])
                , 'username' => $users['username']
                , 'password' => $users['password']
            ];

            return $this->respond($output, 200);
        }else {
            $output =  [
                'status' => 400
                , 'message' => 'Gagal menemukan data'
                , 'data' => ''
            ];
            return $this->respond($output,400);
        }
    }
    // public function edit($id_user = null)
    // {
    //     $users = $this->user->getUser($id_user);
    //     if (isset($users)) {
    //         $output =[
    //             'id_user' =>intval($users['id_user'])
    //             , 'username' => $users['username']
    //             , 'password' => $users['password']
    //         ];

    //         return $this->respond($output, 200);
    //     }else {
    //         $output =  [
    //             'status' => 400
    //             , 'message' => 'Gagal menemukan data'
    //             , 'data' => ''
    //         ];
    //         return $this->respond($output,400);
    //     }
    // }

    public function update($id = null)
    {   
        //menangkap data dari method PUT, DELETE , PATCH
        $data = $this->request->getRawInput();
        //cek data user berdasarkan id
        $user = $this->user->getUser($id);
        // cek user
        if (isset($user)) {
            // update
            $updateUser = $this->user->updateUser($data, $id);
            $output =[
                'status' => true
                , 'data' => ''
                , 'message' => 'Update successfully'
            ];
            return $this->respond($output, 200);
        }else {
            $output =[
                'status' => false
                , 'data' => ''
                , 'message' => 'Update failed'
            ];
            return  $this->respond($output, 400);
        }

    }
    public function delete($id = null)
    {   
        //menangkap data dari method PUT, DELETE , PATCH
        $data = $this->request->getRawInput();
        //cek data user berdasarkan id
        $user = $this->user->getUser($id);
        // cek user
        if (isset($user)) {
            // delete
            $deleteUser = $this->user->deleteUser($id);
            $output =[
                'status' => true
                , 'data' => ''
                , 'message' => 'Deleted successfully'
            ];
            return $this->respond($output, 200);
        }else {
            $output =[
                'status' => false
                , 'data' => ''
                , 'message' => 'Deleted failed'
            ];
            return  $this->respond($output, 400);
        }

    }


}

?>