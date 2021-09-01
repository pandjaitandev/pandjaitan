<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Ideologis extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ideologis_m');
	}

	// LOAD DATA AJA
	public function index(){
		if (isset($this->session->id)) {
			redirect('ideologis/data/');
		} else {
			redirect('ideologis/data_publik/');
		}
	}

	public function data()
	{	
		$previllage = 4;
		check_super_user($this->session->tipe_user,$previllage);	
		$data['menu'] = "Data Pendaftar";
		$data['header_script'] = "anggota_header";
		$data['footer_script'] = "anggota_footer";
		$data['row'] = $this->ideologis_m->get();
		$this->templateadmin->load('template/dashboard','ideologis/data',$data);
	}

	public function data_publik()
	{
		$data['menu'] = "Data Tugas Ideologis";
		$data['row'] = $this->ideologis_m->getLatest();
		$data['header_script'] = "anggota_header";
		$data['footer_script'] = "anggota_footer";
        $this->templateadmin->load('template/publik','ideologis/data_publik',$data);
	}

	public function detail()
	{	
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);	
		$id = $this->uri->segment(3);
		$data['menu'] = "Detail Pendaftar";
		$data['row'] = $this->ideologis_m->get($id)->row();
		$this->templateadmin->load('template/dashboard','ideologis/detail',$data);
	}


	// FORM EKSEKUSI
	public function tambah()
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nik', 'nik', 'min_length[3]|max_length[20]|alpha_dash');
		$this->form_validation->set_rules('email', 'email', 'min_length[3]|is_unique[tb_user.email]|is_unique[tb_user_tmp.email]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[3]|is_unique[tb_user.hp]|is_unique[tb_user_tmp.hp]|max_length[20]|alpha_dash');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Pendataan Tugas Ideologis PMII";
			$this->templateadmin->load('template/umum','ideologis/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->ideologis_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Tugas Ideologis Berhasil Di Tambahkan');
	        }	
	        redirect('ideologis/tambah');	        	
	    }
	}

	public function edit($id)
	{			
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('user_id', 'user_id', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->ideologis_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data ideologis";			
				$this->templateadmin->load('template/dashboard','ideologis/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('ideologis')."';</script>";
			}

	    } else {
	      $post = $this->input->post(null, TRUE);
	      $this->ideologis_m->update($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Edit');
	    	}	  	 	
	        redirect('ideologis');
	    }	        
	}


	//PERINTAH EKSEKUSI DATA
	function hapus(){
	  $previllage = 4;
	  check_super_user($this->session->tipe_user,$previllage);
	  	
	  $id = $this->uri->segment(3);
	  $this->ideologis_m->hapus($id);
	  $this->session->set_flashdata('danger','Berhasil Di Hapus');
	  redirect('ideologis/data');
	}

	
}
