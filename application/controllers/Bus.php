<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Bus extends CI_Controller
{

	public function index()
	{

		$this->load->view('bus');
	}



}


