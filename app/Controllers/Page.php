<?php

namespace App\Controllers;
use App\Libraries\DataTables;

class Page extends BaseController
{
    // public function __construct()
    // {
    //     $this->Serverside_model = new \App\Models\Serverside_model();
    // }

    public function __construct()
    {
        $this->DataTables = new DataTables();
    }

    public function games1()
    {
        // echo "GAMES1";
        return view('games1');
    }

    public function games2()
    {
        return view('games2');

    }

    public function games3()
    {
        return view('games3');

    }

    //generate data table games
    public function data_sample1()
    {
        
        $query = "SELECT * FROM V_Jawaban1";
        
        $where  = NULL;
        
        $isWhere = null;
        
        $search = array('username','skor');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    
    public function data_sample2()
    {
        
        $query = "SELECT * FROM V_Jawaban2";
        
        $where  = NULL;
        
        $isWhere = null;
        
        $search = array('username','skor');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function data_sample3()
    {
        
        $query = "SELECT * FROM V_Jawaban3";
        
        $where  = NULL;
        // $where  = ['kategori.nama_kategori' => 'framework'];
        
        
        
        $isWhere = null;
        
        $search = array('username','skor');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
 

}

