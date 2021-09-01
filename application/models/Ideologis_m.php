<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ideologis_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_ideologis');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$this->db->order_by("tgl","desc");
		$query = $this->db->get();
		return $query;
	}

	public function getLatest() 
	{
		$this->db->from('tb_ideologis');
		$this->db->where('tgl >=',date("Y-m-d"));
	    $this->db->order_by('tgl',"asc");
		$query = $this->db->get();
		return $query;
	}

	public function getPendaftar($tipe_user, $komisariat_id = null, $rayon_id = null) 
	{
		$this->db->from('tb_ideologis');
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
	  $params['id'] =  "";
	  $params['kategori'] =  $post['kategori'];
	  $params['tgl'] =  $post['tgl'];
	  $params['waktu_mulai'] =  $post['waktu_mulai'];
	  $params['waktu_selesai'] =  $post['waktu_selesai'];
	  $params['pemohon'] =  $post['pemohon'];
	  $params['petugas'] =  $post['petugas'];
	  $params['lokasi'] =  $post['lokasi'];
	  $params['cp'] =  $post['cp'];
	  $params['created'] =  date("Y:m:d:h:i:sa");
	  $this->db->insert('tb_ideologis',$params);
	}

	function update($post)
  {
    $params['id'] =  $post['id'];
    $params['kategori'] =  $post['kategori'];
	$params['tgl'] =  $post['tgl'];
	$params['waktu_mulai'] =  $post['waktu_mulai'];
	$params['waktu_selesai'] =  $post['waktu_selesai'];
	$params['pemohon'] =  $post['pemohon'];
	$params['petugas'] =  $post['petugas'];
	$params['lokasi'] =  $post['lokasi'];
	$params['cp'] =  $post['cp'];

    $this->db->where('id',$params['id']);
    $this->db->update('tb_ideologis',$params);
  }


	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete('tb_ideologis');

	}

	


}
