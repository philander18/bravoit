<?php

namespace App\Controllers;
use App\Libraries\DataTables;

class Sample extends BaseController
{

    public function __construct()
    {
        $this->DataTables = new DataTables();
    }

    public function index()
    {
        return view('table_view');
    }

    public function data_sample()
    {
        
        $query = "SELECT kategori.nama_kategori AS nama_kategori, subkat.* FROM subkat 
                  JOIN kategori ON subkat.id_kategori = kategori.id_kategori";
        
        $where  = NULL;
        // $where  = ['kategori.nama_kategori' => 'framework'];
        
        
        
        $isWhere = null;
        
        $search = array('nama_kategori','subkat','tgl_add');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
}
?>