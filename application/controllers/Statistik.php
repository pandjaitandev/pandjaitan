<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);
	}

	public function index()
	{		
		$data['menu'] = "Statistik Data";
		$data['footer_script'] = "chart-admin";
		$this->templateadmin->load('template/dashboard','statistik/statistik_data',$data);
	}

	
}
