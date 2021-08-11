<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Rayon extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->model('rayon_m');
    }
 
    function index(){
        $previllage = 4;
        check_super_user($this->session->tipe_user,$previllage);
        
        $data['menu'] = "Data rayon";
        $data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-rayon";
        $this->templateadmin->load('template/dashboard','rayon/rayon_data',$data);
    }


    // DATATABLES
    function get_data_rayon()
    {
        $list = $this->rayon_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->deskripsi;
            $row[] = $this->fungsi->get_deskripsi("tb_komisariat",$field->komisariat_id);
            $row[] = '
                <a href="'.base_url('rayon/detail/'.$field->id).'" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i> Detail</a>
                <a href="'.base_url('rayon/edit/'.$field->id).'" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Edit</a>
                <a href="'.base_url('rayon/hapus/'.$field->id).'" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus</a>

                ';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->rayon_m->count_all(),
            "recordsFiltered" => $this->rayon_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    // DATATABLES
    

    // FORM EKSEKUSI
    public function tambah()
    {   
        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[3]|is_unique[tb_rayon.nama]|is_unique[tb_rayon.nama]|max_length[100]');
        $this->form_validation->set_rules('email', 'email', 'min_length[3]|is_unique[tb_rayon.email]|is_unique[tb_rayon.email]');
        $this->form_validation->set_rules('kontak', 'kontak', 'min_length[3]|is_unique[tb_rayon.kontak]|is_unique[tb_rayon.kontak]|max_length[15]|alpha_dash');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Tambah Data rayon";
            $this->templateadmin->load('template/dashboard','rayon/tambah',$data);
        } else {
            $post = $this->input->post(null, TRUE);         
            $this->rayon_m->simpan($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Data rayon Berhasil Ditambahkan');
            }   
            redirect('rayon');             
        }
    }

    public function edit($id)
    {           
        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[100]');
        $this->form_validation->set_rules('email', 'email', 'min_length[3]');
        $this->form_validation->set_rules('kontak', 'kontak', 'min_length[3]|is_unique[tb_rayon.kontak]|is_unique[tb_rayon.kontak]|max_length[15]|alpha_dash');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->rayon_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $data['menu'] = "Edit Data rayon";          
                $this->templateadmin->load('template/dashboard','rayon/edit',$data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
                echo "<script>window.location='".site_url('rayon')."';</script>";
            }

        } else {
          $post = $this->input->post(null, TRUE);
          $this->rayon_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Berhasil Di Edit');
            }           
            redirect('rayon');
        }
    }

    function hapus(){
        //Mencegah user yang bukan haknya
        $previllage = 4;
        check_super_user($this->session->tipe_user,$previllage);
        $id = $this->uri->segment(3);        
        $this->rayon_m->hapus($id);
        $this->session->set_flashdata('danger','Berhasil Di Hapus');
        redirect('rayon');
    }

    public function detail()
    {
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);

        $id = $this->uri->segment('3');
        $query = $this->rayon_m->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['menu'] = "Profil Rayon";          
            $this->templateadmin->load('template/dashboard','rayon/rayon_detail',$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('rayon')."';</script>";
        }
    }



    
 
}