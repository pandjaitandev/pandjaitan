<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('sk_m');
	}

	public function index()
	{		
		$tipe_user = $this->session->tipe_user;
		if ($tipe_user < 4) {
			redirect('sk/tambah');
		} else {
			redirect('sk/data');
		}
	}

	public function data()
	{	
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);	
		$data['menu'] = "Data Pengajuan SK";
		$data['header_script'] = "datatables-header";
		$data['footer_script'] = "datatables-sk";
		$data['row'] = $this->sk_m->get();
		$this->templateadmin->load('template/dashboard','sk/data',$data);
	}

	public function detail($id)
	{					
		$query = $this->sk_m->get($id);
		if ($query->num_rows() > 0) {
			$data['url'] = base_url('assets/dist/files/sk/'.$query->row("file"));
			$this->load->view('sk/sk_detail',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('user')."';</script>";
		}				    
	}

	public function tambah()
	{
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->fungsi->user_login()->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('periode', 'periode', 'min_length[3]|max_length[12]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Pengajuan SK";
			$data['header_script'] = "anggota_header";
			$data['footer_script'] = "anggota_footer";			
			$data['row'] = $this->sk_m->getPendaftar($this->session->tipe_user,$this->session->komisariat_id,$this->session->rayon_id);			
			$this->templateadmin->load('template/dashboard','sk/tambah',$data);
	    } else {
        $post = $this->input->post(null, TRUE);	                        

        //CEK GAMBAR
        $config['upload_path']          = 'assets/dist/files/sk/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 5000;
        $config['file_name']            = uniqid();

				$this->load->library('upload', $config);
				if (@$_FILES['file']['name'] != null) {						
						$this->upload->initialize($config);
				  	if ($this->upload->do_upload('file')) {
				  	 	$post['file'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('sk/tambah');
		        }			    	  	 	
				}			
			 
				$this->sk_m->simpan($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Publish');
	    	}	  	 	
	      redirect('sk');	        	
	    }
	}

	public function upload($id)
	{			
		//Mencegah user yang bukan haknya
		$previllage = 4;
		check_super_user($this->session->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->sk_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Tambah SK";
				$data['header_script'] = "summernote-header";
				$data['footer_script'] = "summernote-footer";			
				$this->templateadmin->load('template/dashboard','sk/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('sk')."';</script>";
			}
			
	    } else {
	    $post = $this->input->post(null, TRUE);	                        

        //CEK GAMBAR
        $config['upload_path']          = 'assets/dist/files/sk/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 5000;
        $config['file_name']            = uniqid();

				$this->load->library('upload', $config);
				if (@$_FILES['download']['name'] != null) {						
						$this->upload->initialize($config);
				  	if ($this->upload->do_upload('download')) {
				  	 	$post['download'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('sk/edit/'.$post['id']);
		        }			    	  	 	
				}			
			 
				$this->sk_m->upload_sk($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Publish');
	    	}	  	 	
	      redirect('sk');	        	
	    }
	}

	public function edit($id)
	{			
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->sk_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Tambah SK";
				$data['header_script'] = "summernote-header";
				$data['footer_script'] = "summernote-footer";			
				$this->templateadmin->load('template/dashboard','sk/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('sk')."';</script>";
			}
			
	    } else {
	    $post = $this->input->post(null, TRUE);	                        

        //CEK GAMBAR
        $config['upload_path']          = 'assets/dist/files/sk/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 5000;
        $config['file_name']            = uniqid();

				$this->load->library('upload', $config);
				if (@$_FILES['download']['name'] != null) {						
						$this->upload->initialize($config);
				  	if ($this->upload->do_upload('download')) {
				  	 	$post['download'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('sk/edit/'.$post['id']);
		        }			    	  	 	
				}			
			 
				$this->sk_m->upload_sk($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Publish');
	    	}	  	 	
	      redirect('sk');	        	
	    }
	}

	function hapusfile(){
		//Mencegah user yang bukan haknya
		$previllage = 4;
		check_super_user($this->session->tipe_user,$previllage);

	  	$id = $this->uri->segment(3);
		

		//Action		  
		$itemfile = $this->sk_m->get($id)->row();
  		if ($itemfile->download != null) {
  			$target_file = 'assets/dist/files/sk/'.$itemfile->download;
  			unlink($target_file);
  		}
  		$params['download'] = "";
  		$this->db->where('id',$id);
	  	$this->db->update('tb_sk',$params);
	  	redirect('sk/edit/'.$id);	  
	}

	function hapus(){
		//Mencegah user yang bukan haknya
		$previllage = 4;
		check_super_user($this->session->tipe_user,$previllage);

	 	$id = $this->uri->segment(3);

		$itemsk = $this->sk_m->get($id)->row();		
		if ($itemsk->file != null) {
			$target_file = 'assets/dist/files/sk/'.$itemsk->file;
			unlink($target_file);
		}

		$itemdownload = $this->sk_m->get($id)->row();		
		if ($itemdownload->download != null) {
			$target_file = 'assets/dist/files/sk/'.$itemdownload->download;
			unlink($target_file);
		}
		
		$this->sk_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('sk/data/');
	}

		
}

