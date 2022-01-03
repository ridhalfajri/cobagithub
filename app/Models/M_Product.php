<?php

namespace app\Models;

use CodeIgniter\Model;

class M_Product extends Model
{
    protected $table = 'product';

    public function __construct()
    {
        $this->db= db_connect();
        $this->builder= $this->db->table($this->table);
    }

    public function getAllData()
    {
        return $this->db-> table('komoditi')->get()->getResultArray();
        
    }

    public function GetProductChart()
    {
        $builder = $this->db->table('komoditi');
        $builder->select('nama_komoditi as label, jumlah as value');
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function getProductChart2(){
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $db_name = 'komoditas';

            $conn = mysqli_connect($host, $username, $password, $db_name) or die('Connection failed.');

            $hsl = mysqli_query($conn, "SELECT * FROM komoditi");
            
            $d = array();
            while ($rcrd = mysqli_fetch_assoc($hsl)){
                array_push($d, array("label"=>$rcrd['nama_komoditi'], "value" => $rcrd['jumlah']));
            }

            $c = array( "caption"=> "Pemasukan Komoditas",
                    "subCaption"=>"Komoditas Pangan",
                    "xAxisName"=>"Nama Komoditi",
                    "yAxisName"=>"Jumlah",
                    "theme"=>"fint");

            $gab = array("chart"=>$c, "data"=>$d);   
            $j = json_encode($gab);
            dd($j);
            echo $j;
    }


    public function addDataProduct($data)
    {
        return $this->db->table('komoditi')->insert($data);
    }
    public function deleteProductById($id)
    {
        return $this->db->table('komoditi')->delete(['id_komoditi'=> $id]);
    }
    public function editProductDataById($data, $id_komoditi)
    {
        return $this->db->table('komoditi')->update($data,['id_komoditi'=>$id_komoditi]);
    }
}