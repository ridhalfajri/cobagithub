<?php

namespace app\Models;

use CodeIgniter\Model;

class M_Test extends Model
{
    protected $table = 'product';

    public function __construct()
    {
        $this->db= db_connect();
        $this->builder= $this->db->table($this->table);
    }

    public function connectToDB(){
        // Connect to database
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbnm = "komoditas";
        $link = mysqli_connect($host, $user, $pass,$dbnm);
        dd($link);
    }
}