<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_user_tmp');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getPendaftar($tipe_user, $komisariat_id = null, $rayon_id = null) 
	{
		$this->db->from('tb_user_tmp');
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
	  $params['komisariat_id'] =  $post['komisariat_id'];
	  $params['rayon_id'] =  $post['rayon_id'];
	  $params['nama'] =  $post['nama'];
	  $params['nik'] =  $post['nik'];
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
	  $this->db->insert('tb_user_tmp',$params);
	}


	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete('tb_user_tmp');

	}

	function acc($id)
	{			
		$pendaftar = $this->fungsi->pilihan_selected("tb_user_tmp",$id);
		//Dapatkan ID Anggota -> Rumusnya
		// $id_kelompok = $this->fungsi->pilihan_advanced("tb_kelompok","id_kelompok",$pendaftar->row('id_kelompok'))->row("id_kelompok");
		// $no_urut = $this->fungsi->pilihan_advanced("tb_user","id_kelompok",$pendaftar->row('id_kelompok'))->num_rows() + 1;
		// $params['no_anggota'] = $id_kelompok.".".date('ymd').".".str_pad($no_urut, 5, "0", STR_PAD_LEFT);

		foreach ($pendaftar->result() as $datapendaftar)
		{
			$params['no_anggota'] =  $datapendaftar->nik;
			$params['username'] =  $datapendaftar->nik;
			$params['password'] =  sha1($datapendaftar->nik);
			$params['komisariat_id'] =  $datapendaftar->komisariat_id;
			$params['rayon_id'] =  $datapendaftar->rayon_id;
			$params['nik'] =  $datapendaftar->nik;
			$params['nama'] =  $datapendaftar->nama;
			$params['tempat_lahir'] =  $datapendaftar->tempat_lahir;
			$params['tgl_lahir'] =  $datapendaftar->tgl_lahir;
			$params['kelamin'] =  $datapendaftar->kelamin;
			$params['hp'] =  $datapendaftar->hp;
			$params['email'] =  $datapendaftar->email;
			$params['provinsi'] =  $datapendaftar->provinsi;
			$params['kota'] =  $datapendaftar->kota;
			$params['kecamatan'] =  $datapendaftar->kecamatan;
			$params['kelurahan'] =  $datapendaftar->kelurahan;
			$params['domisili'] =  $datapendaftar->domisili;	  
			$params['angkatan'] =  $datapendaftar->angkatan;
			$params['ig'] =  $datapendaftar->ig;
			$params['fb'] =  $datapendaftar->fb;
			$params['twitter'] =  $datapendaftar->twitter;
			$params['angkatan'] =  $datapendaftar->angkatan;
			$params['jenis'] =  $datapendaftar->jenis;
			$params['created'] =  date("Y:m:d:h:i:sa");
		}

		//Tambahan
		$params['pekerjaan'] = null;
		$params['status'] = "1";
		$params['foto'] = null;				
		$params['tipe_user'] = "1";

		$this->db->insert('tb_user',$params);		
		$this->db->where('id', $id);
	  	$this->db->delete('tb_user_tmp');
	}


}
