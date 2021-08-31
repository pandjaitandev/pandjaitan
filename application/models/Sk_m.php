<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_sk');
		if ($id != null) {
			$this->db->where('id',$id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function getPendaftar($tipe_user, $komisariat_id, $rayon_id) 
	{		
		$this->db->from('tb_sk');
		// Filter sesuai dengan akses
		if ($tipe_user == "2") {
			$this->db->where('rayon_id',$rayon_id);
		} elseif ($tipe_user == "3") {
			$this->db->where('komisariat_id',$komisariat_id);
		}
		$query = $this->db->get();
		return $query;
	}	

	function simpan($post)
	{
		if ($post['periode'] == "") {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('error','Ojo Main refresh ae bat...');
			redirect('sk/tambah');
		}

	  $params['id'] =  "";
	  $params['komisariat_id'] =  $this->session->komisariat_id;
	  $params['rayon_id'] =  $this->session->rayon_id;
	  $params['keterangan'] =  $post['keterangan'];
	  $params['file'] =  $post['file'];
	  $params['periode'] =  $post['periode'];
	  $params['user_id'] =  $this->session->id;
	  $params['created'] =  date("Y:m:d:h:i:sa");
	  $params['status'] =  "terkirim";

	  $this->db->insert('tb_sk',$params);	  	 		  	 		   			
	}

	function upload_sk($post)
	{

	  $params['id'] =  $post['id'];
	  if ($post['download'] != null) {
	  	$params['download'] =  $post['download'];
  	  }
	  $params['acc'] =  date("Y:m:d:h:i:sa");
	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_sk',$params);	  	 		  	 		   			
	}

	function hapus($id){

	  $this->db->where('id', $id);
	  $this->db->delete('tb_sk');

	}



}
