<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		check_already_login();
	}

	public function index()
	{
		$data['menu'] = "About Apps";
		$this->templateadmin->load('template/publik','page/landing_publik',$data);
	}
	


}
