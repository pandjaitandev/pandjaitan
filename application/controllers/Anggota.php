<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('anggota_m');
	}

	// LOAD DATA AJA
	public function index(){
		redirect('anggota/data');
	}

	public function data()
	{	
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);	
		$data['menu'] = "Data Anggota";
		$data['header_script'] = "anggota_header";
		$data['footer_script'] = "anggota_footer";
		$this->db->where('tipe_user <','3');
		$data['row'] = $this->anggota_m->getPendaftar($this->session->tipe_user,$this->session->komisariat_id,$this->session->rayon_id);
		$this->templateadmin->load('template/dashboard','anggota/data',$data);
	}

	public function admin()
	{	
		$previllage = 4;
		check_super_user($this->session->tipe_user,$previllage);	
		$data['menu'] = "Data Admin";
		$data['header_script'] = "anggota_header";
		$data['footer_script'] = "anggota_footer";
		$data['row'] = $this->anggota_m->getAdmin();
		$this->templateadmin->load('template/dashboard','anggota/data_admin',$data);
	}

	public function detail()
	{	
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);	
		$id = $this->uri->segment(3);
		$data['menu'] = "Detail Anggota";
		$data['row'] = $this->anggota_m->get($id)->row();
		$this->templateadmin->load('template/dashboard','anggota/detail',$data);
	}


	// FORM EKSEKUSI
	public function tambah()
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nik', 'nik', 'min_length[3]|is_unique[tb_user.nik]|is_unique[tb_user_tmp.nik]|max_length[20]|alpha_dash');
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
			$data['menu'] = "Tambah Anggota PMII";
			$data['footer_script'] = "pendaftaran";
			$this->templateadmin->load('template/dashboard','anggota/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->anggota_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Anggota Berhasil Ditambahkan');
	        }	
	        redirect('anggota/tambah');	        	
	    }
	}


	//PERINTAH EKSEKUSI DATA
	function hapus(){
	  $previllage = 4;
	  $this->session->set_flashdata('warning','Hanya admin yang bisa menghapus');
	  check_super_user($this->session->tipe_user,$previllage);
	  	
	  $id = $this->uri->segment(3);
	  $this->anggota_m->hapus($id);
	  $this->session->set_flashdata('danger','Berhasil Di Hapus');
	  redirect('anggota/data');
	}

	public function edit($id)

	{			
		$this->load->model("user_m");
		//Mencegah user yang bukan haknya
		$tipe_user = $this->session->tipe_user;
		$tipe_user_id = $this->fungsi->pilihan("tb_user",$id)->row("tipe_user");
		$previllage = 2;

		check_super_user($tipe_user,$previllage);
		check_super_user($tipe_user,$tipe_user_id);


		
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('username', 'username', 'min_length[3]|alpha_dash');
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[50]');
		$this->form_validation->set_rules('password', 'password', 'min_length[8]');


		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');

		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');


		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data User";			
				$data['footer_script'] = "pendaftaran";
				$this->templateadmin->load('template/dashboard','anggota/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('user')."';</script>";
			}

	  } else {
      $post = $this->input->post(null, TRUE);	        

      //CEK GAMBAR
      $config['upload_path']          = 'assets/dist/img/foto-user/';
      $config['allowed_types']        = 'jpg|png|jpeg';
      $config['max_size']             = 1000;
      $config['file_name']            = strtoupper($post['username']).'--'.$post['hp'];

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
			  	if ($this->upload->do_upload('foto')) {
			  		$itemfoto = $this->user_m->get($post['id'])->row();
			  		if ($itemfoto->foto != null) {
			  			$target_file = 'assets/dist/img/foto-user/'.$itemfoto->foto;
			  			unlink($target_file);
			  		}

			  	 	$post['foto'] = $this->upload->data('file_name');
	        } else {
						$pesan = $this->upload->display_errors();
						$this->session->set_flashdata('danger',$pesan);
						redirect('anggota/edit/'.$id);
	        }	  	 	
			}


				$this->user_m->update_profil($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Edit');
	    	}	  	 	
	      redirect('anggota');
	    }
	}

	function hapusfoto(){
	 $id = $this->uri->segment(3);

    //Action          
    $this->load->model('user_m');
    $itemfoto = $this->user_m->get($id)->row();
    if ($itemfoto->foto != null) {
        $target_file = 'assets/dist/img/foto-user/'.$itemfoto->foto;
        unlink($target_file);
    }
    $params['foto'] = null;
    $this->db->where('id',$id);
    $this->db->update('tb_user',$params);
    redirect('anggota/edit/'.$id);   
	}

}
