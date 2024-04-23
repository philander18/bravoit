<?php

namespace App\Controllers;

// use CodeIgniter\Controller;

class HomeController extends BaseController {

    public function __construct()
    {
         $this->db = \Config\Database::connect();
    }

    private $kunci_jawaban_1 = array(
    "DITASARI",
    "HAIDIN",
    "KHARISMA",
    "MARCELIUS",
    "MELITA",
    "SOFIE",
    "FREDERICK",
    "AFI",
    "ALOYSIUS",
    "ANDREAS",
    "CAHYA",
    "DERIMALIK",
    "FELANIE",
    "FENNY",
    "FIRDAUS",
    "GOLIYAT",
    "HENDRI",
    "JERRY",
    "JUNAEDI",
    "MASYHUR",
    "OKI",
    "PERMADI",
    "PHILANDER",
    "SAM",
    "SAYO",
    "SEKAR",
    "SENDI",
    "SENJAYA",
    "SURYANI",
    "TAUFIK",
    "WIDHIARSO",
    "YOSEPH",
    "YUDI",
    "KRISNA",
    "YUNUS",
    "AWALUDIN",
    "FAUSTINA",
    "HENDRIK",
    "NININ",
    "SANTOSO",
    "TENI",
    "ADIT",
    "TIKA",
    "HARIS",
    "INDRA",
    "RIFA",
    "SULTON",
    "NAUFAL",
    "YIRHAN",
    "REIVAL");

    private $kunci_jawaban_2 = array(
    "AYAM",
    "AYAM LAGA",
    "BEBEK",
    "BURUNG",
    "SAPI",
    "KAMBING",
    "DOMBA",
    "KERBAU",
    "KUCING",
    "ANJING",
    "IKAN",
    "KUDA",
    "BABI",
    "ANAK SAPI",
    "ANAK KUDA",
    "ANAK KERBAU",
    "ANAK BABI");    

    private $kunci_jawaban_3 = array(
    "MUTUAL BENEFICIAL RELATIONSHIP",
    "EQUAL OPPORTUNITIES",
    "DEDICATED TEAMWORK",
    "INNOVATIVE CULTURE",
    "OPEN MINDED ATTITUDE",
    "NOBLE SPIRIT",
    "CONTINUOUS LEARNING",
    "ACCOUNTABLE",
    "RESPECTFUL",
    "ENTHUSIASTIC"
    );

    public function username(){
        echo view('username');
    }

    public function submit_username(){
        $db = \Config\Database::connect(); 
        $results = $db->query("SELECT * FROM user WHERE username = '" . $this->request->getPost('username') . "'");
        // var_dump($results);

        if ($results->getNumRows() > 0) {
            $status=$results->getRow()->status; 
            if( $status =='-1' )
                {

                    $this->session->set(['P_BravoIT' => '1']);
                  echo '-1';

                } else 
                {
                    $newdata = [
                        'username'  => $this->request->getPost('username'),
                    ];
            
                    $this->session->set($newdata);
            
                    echo '1';
                }
            }
        else {
            echo '0';
        }
    }

    public function form(){
        $db = \Config\Database::connect(); 
        $query = $db->query("SELECT * FROM game_status");
        $game_status = $query->getRow()->game_status;

        $query = $db->query("SELECT * FROM user WHERE username = '" . $this->session->get('username') . "'");
        $user_status = $query->getRow()->status;

        $newdata = [
            'user_status'  => $user_status,
            'game_status'  => $game_status,
        ];

        $this->session->set($newdata);

        echo view('form');
    }

    public function submit_form(){
        date_default_timezone_set('Asia/Jakarta');

        $db = \Config\Database::connect(); 
        $query = $db->query("SELECT * FROM game_status");
        $game_status = $query->getRow()->game_status;

        $query = $db->query("SELECT * FROM user WHERE username = '" . $this->session->get('username') . "'");
        $user_status = $query->getRow()->status;

        if ($game_status == $user_status) {
            $skor = 0;

            if ($game_status == 1) {
                foreach ($this->request->getPost('jawaban') as $element_jawaban) {
                    if (in_array(strtoupper($element_jawaban), $this->kunci_jawaban_1)) {
                        $skor += 10;

                        $db->query("UPDATE Rekap_Jawaban_1 SET Jumlah_Benar = Jumlah_Benar + 1 WHERE Jawaban = '" . $element_jawaban . "'");
                    }
                }

                $data = [
                    'username' => $this->session->get('username'),
                    'jawaban' => implode(',', $this->request->getPost('jawaban')),
                    'skor' => $skor,
                    'waktu_submit' => date('Y-m-d H:i:s')
                ];
                
                $builder = $db->table('Jawaban_1');
                $builder->insert($data);

                $db->query("UPDATE user SET status = '1-D' WHERE username = '" . $this->session->get('username') . "'");
            } 
            else if ($game_status == 2) {
                foreach ($this->request->getPost('jawaban') as $element_jawaban) {
                    if (in_array(strtoupper($element_jawaban), $this->kunci_jawaban_2)) {
                        $skor += 10;

                        $db->query("UPDATE Rekap_Jawaban_2 SET Jumlah_Benar = Jumlah_Benar + 1 WHERE Jawaban = '" . $element_jawaban . "'");
                    }
                }

                $data = [
                    'username' => $this->session->get('username'),
                    'jawaban' => implode(',', $this->request->getPost('jawaban')),
                    'skor' => $skor,
                    'waktu_submit' => date('Y-m-d H:i:s')
                ];
                
                $builder = $db->table('Jawaban_2');
                $builder->insert($data);

                $db->query("UPDATE user SET status = '2-D' WHERE username = '" . $this->session->get('username') . "'");
            }
            else if ($game_status == 3) {
                foreach ($this->request->getPost('jawaban') as $element_jawaban) {
                    if (in_array(strtoupper($element_jawaban), $this->kunci_jawaban_3)) {
                        if(strtoupper($element_jawaban) == "MUTUAL BENEFICIAL RELATIONSHIP" || strtoupper($element_jawaban) == "OPEN MINDED ATTITUDE"){
                            $skor += 30;
                        } else if (strtoupper($element_jawaban) == "EQUAL OPPORTUNITIES" || strtoupper($element_jawaban) == "DEDICATED TEAMWORK" || strtoupper($element_jawaban) == "INNOVATIVE CULTURE" || strtoupper($element_jawaban) == "NOBLE SPIRIT"|| strtoupper($element_jawaban) == "CONTINUOUS LEARNING")
                        { 
                            $skor += 20;
                        } else {
                            $skor += 10;
                        }
                        

                        $db->query("UPDATE Rekap_Jawaban_3 SET Jumlah_Benar = Jumlah_Benar + 1 WHERE Jawaban = '" . $element_jawaban . "'");
                    }
                }

                $data = [
                    'username' => $this->session->get('username'),
                    'jawaban' => implode(',', $this->request->getPost('jawaban')),
                    'skor' => $skor,
                    'waktu_submit' => date('Y-m-d H:i:s')
                ];
                
                $builder = $db->table('Jawaban_3');
                $builder->insert($data);

                $db->query("UPDATE user SET status = '3-D' WHERE username = '" . $this->session->get('username') . "'");
            }

            echo '1';
        }
        else {
            echo '0';
        }
    }

    public function ruang_tunggu() {
        $db = \Config\Database::connect(); 
        $query = $db->query("SELECT * FROM game_status");
        $game_status = $query->getRow()->game_status;

        $query = $db->query("SELECT * FROM user WHERE username = '" . $this->session->get('username') . "'");
        $user_status = $query->getRow()->status;

        $newdata = [
            'user_status'  => $user_status,
            'game_status'  => $game_status,
        ];

        $this->session->set($newdata);

        echo view('ruangtunggu');
    }

    public function TestSSE() {
        $db = \Config\Database::connect(); 
        $query = $db->query("SELECT * FROM game_status");
        $game_status = $query->getRow()->game_status;
        $game_start = '';

        while (true) {
            $query = $db->query("SELECT * FROM game_status");

            if ($game_status == '1') {
                $game_start = $query->getRow()->game_1_start;
            } else if ($game_status == '2') {
                $game_start = $query->getRow()->game_2_start;
            } else if ($game_status == '3') {
                $game_start = $query->getRow()->game_3_start;
            }

            if ($game_start != NULL) {
                echo '1';
                break;
            } else {
                usleep(100000);
            }
        }
    }
    public function game1_start() {
        $db = \Config\Database::connect(); 
        $query = $db->query("UPDATE `game_status` SET game_1_start =1 WHERE game_status=1");
        echo "1";
                
    }

    public function game2_start() {
        $db = \Config\Database::connect(); 
        $query = $db->query("UPDATE `game_status` SET game_2_start =1 WHERE game_status=2");
                
    }

    public function game3_start() {
        $db = \Config\Database::connect(); 
        $query = $db->query("UPDATE `game_status` SET game_3_start =1 WHERE game_status=3");
                
    }

    public function game1_finalisasi() {
        $db = \Config\Database::connect(); 
        $query = $db->query("UPDATE `game_status` SET game_status=2 WHERE game_1_start IS NOT NULL");
        $query2 = $db->query("UPDATE `user` SET STATUS=2 WHERE username IN (SELECT username FROM V_Jawaban1)");
                
    }

    public function game2_finalisasi() {
        $db = \Config\Database::connect(); 
        $query = $db->query("UPDATE `game_status` SET game_status=3 WHERE game_2_start IS NOT NULL");
        $query2 = $db->query("UPDATE `user` SET STATUS=3 WHERE username IN (SELECT username FROM V_Jawaban2)");
                
    }

    public function game1_reset() {
        $db = \Config\Database::connect(); 
        $query = $db->query("UPDATE `game_status` SET game_1_start =NULL WHERE game_status=1");
        $query2 = $db->query("UPDATE `user` SET STATUS=1 WHERE status='1-D'");

    }

    public function game2_reset() {
        $db = \Config\Database::connect(); 
        $query = $db->query("UPDATE `game_status` SET game_2_start =NULL WHERE game_status=2");
        $query2 = $db->query("UPDATE `user` SET STATUS=2 WHERE status='2-D'");
    }

    public function game3_reset() {
        $db = \Config\Database::connect(); 
        $query = $db->query("UPDATE `game_status` SET game_3_start =NULL WHERE game_status=3");
        $query2 = $db->query("UPDATE `user` SET STATUS=3 WHERE status='3-D'");
    }


}
?>