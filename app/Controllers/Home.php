<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('dashboard');
   }

   function index2()
	{
		$this->load->view('games3');
	}
 

}

