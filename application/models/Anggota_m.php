<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getPendaftar($tipe_user, $komisariat_id = null, $rayon_id = null) 
	{
		$this->db->from('tb_user');
		// Filter sesuai dengan akses
		if ($tipe_user == "2") {
			$this->db->where('rayon_id',$rayon_id);
		} elseif ($tipe_user == "3") {
			$this->db->where('komisariat_id',$komisariat_id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getAdmin($tipe_user = null) 
	{
		$this->db->from('tb_user');
		if ($tipe_user != null) {
			$this->db->where('tipe_user',$tipe_user);
		}
		$this->db->where('tipe_user >','1');
		$this->db->where('tipe_user <','4');
		$this->db->order_by("komisariat_id","asc");
		$this->db->order_by("created","asc");
		$query = $this->db->get();
		return $query;
	}
	
	function simpan($post)
	{
	  //Data Komisariat
	  $params['id'] =  "";
	  $params['no_anggota'] =  $post['nik'];
	  $params['username'] =  $post['nik'];
	  $params['password'] =  sha1($post['nik']);
	  $params['komisariat_id'] =  $post['komisariat_id'];
	  $params['rayon_id'] =  $post['rayon_id'];
	  $params['nik'] =  $post['nik'];
	  $params['nama'] =  $post['nama'];
	  $params['tempat_lahir'] =  ucwords(strtolower($post['tempat_lahir']));
	  $params['tgl_lahir'] =  $post['tgl_lahir'];
	  $params['hp'] =  $post['hp'];
	  $params['email'] =  $post['email'];
	  $params['kelamin'] =  $post['kelamin'];
	  $params['provinsi'] =  $post['provinsi'];
	  $params['kota'] =  $post['kota'];
	  $params['kecamatan'] =  $post['kecamatan'];
	  $params['kelurahan'] =  $post['kelurahan'];
	  $params['domisili'] =  $post['domisili'];	  
	  $params['ig'] =  $post['ig'];	  
	  $params['fb'] =  $post['fb'];	  
	  $params['twitter'] =  $post['twitter'];	  
	  $params['angkatan'] =  $post['angkatan'];
	  $params['jenis'] =  $post['jenis'];
	  $params['created'] =  date("Y:m:d:h:i:sa");

	  //Tambahan
	  $params['pekerjaan'] = null;
	  $params['status'] = "1";
	  $params['foto'] = null;				
	  $params['tipe_user'] = "1";

	  $this->db->insert('tb_user',$params);
	}


	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete('tb_user');

	}


}
