<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table = 'user';

    public function getUser($id_user = false){
        if ($id_user == false)
        {
            return $this-> findAll();
        }else {
            return $this -> getWhere(['id_user'=>$id_user])->getRowArray();
        }
    }
    
    public function insertUser($data){
        $query = $this->db->table($this->table)->insert($data);
        if ($query) {
            return true;
        }else {
            return false;
        }
    }

    public function updateUser($data, $id){
        return $this->db->table($this->table)->update($data,['id_user' =>$id]);
    }

    public function deleteUser($id){
        return $this->db->table($this->table)->delete(['id_user' =>$id]);
    }




    public function getUserByUsername($username){
        return $this -> getWhere(['username'=>$username])->getRowArray();
    }

    public function addDataUser($data){
        return $this->db->table('user')->insert($data);
    }



}


?>