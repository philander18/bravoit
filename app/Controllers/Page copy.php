<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function __construct()
    {
        $this->Serverside_model = new \App\Models\Serverside_model();
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
    public function listdata1()
    {
 
        $request = \Config\Services::request();
        $list_data = $this->Serverside_model;
        $where = ['id !=' => 0];
                //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
                //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array('Jawaban_1.username','Jawaban_1.jawaban','Jawaban_1.skor','Jawaban_1.waktu_submit');
        $column_search = array('Jawaban_1.username','Jawaban_1.jawaban','Jawaban_1.skor','Jawaban_1.waktu_submit');
        $order = array('Jawaban_1.skor' => 'desc');
        $list = $list_data->get_datatables('Jawaban_1', $column_order, $column_search, $order, $where);
        $data = array();
        // var_dump($list);
        $no = $request->getPost("start");
        foreach ($list as $lists) {
            $no++;
            $row    = array();
            $row[] = $no;
            $row[] = $lists->username;
            $row[] = $lists->jawaban;
            $row[] = $lists->skor;
            $row[] = $lists->waktu_submit;
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('Jawaban_1',$order),
            "recordsFiltered" => $list_data->count_filtered('Jawaban_1', $column_order, $column_search, $order),
            "data" => $data,
        );
 
        return json_encode($output);
    }

    //generate data table games2
    public function listdata2()
    {
 
        $request = \Config\Services::request();
        $list_data = $this->Serverside_model;
        $where = ['id_pengguna !=' => 0];
                //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
                //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array('pengguna.username','pengguna.nama','pengguna.level');
        $column_search = array('pengguna.username','pengguna.nama','pengguna.level');
        $order = array('pengguna.username' => 'asc');
        $list = $list_data->get_datatables('pengguna', $column_order, $column_search, $order, $where);
        $data = array();
        // var_dump($list);
        $no = $request->getPost("start");
        foreach ($list as $lists) {
            $no++;
            $row    = array();
            $row[] = $no;
            $row[] = $lists->username;
            $row[] = $lists->nama;
            $row[] = $lists->level;
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('pengguna'),
            "recordsFiltered" => $list_data->count_filtered('pengguna', $column_order, $column_search, $order),
            "data" => $data,
        );
 
        return json_encode($output);
    }

    //generate data table games3
    public function listdata3()
    {
        $request = \Config\Services::request();
        $list_data = $this->Serverside_model;
        $where = ['id_pengguna !=' => 0];
                //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
                //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array('pengguna.username','pengguna.nama','pengguna.level');
        $column_search = array('pengguna.username','pengguna.nama','pengguna.level');
        $order = array('pengguna.id_pengguna' => 'DESC');
        $list = $list_data->get_datatables('pengguna', $column_order, $column_search, $order, $where);
        $data = array();
        // var_dump($list);
        $no = $request->getPost("start");
        foreach ($list as $lists) {
            $no++;
            $row    = array();
            $row[] = $no;
            $row[] = $lists->username;
            $row[] = $lists->nama;
            $row[] = $lists->level;
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('pengguna'),
            "recordsFiltered" => $list_data->count_filtered('pengguna', $column_order, $column_search, $order),
            "data" => $data,
        );
 
        return json_encode($output);
    }
 

}

