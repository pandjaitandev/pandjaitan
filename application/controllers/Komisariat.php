<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Komisariat extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->model('komisariat_m');
    }
 
    function index(){
        $previllage = 4;
        check_super_user($this->session->tipe_user,$previllage);
        
        $data['menu'] = "Data komisariat";
        $data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-komisariat";
        $this->templateadmin->load('template/dashboard','komisariat/komisariat_data',$data);
    }

    public function detail()
    {
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);

        $id = $this->uri->segment('3');
        $query = $this->komisariat_m->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['menu'] = "Profil komisariat";          
            $this->templateadmin->load('template/dashboard','komisariat/komisariat_detail',$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('user')."';</script>";
        }
    }
 
    // DATATABLES
    function get_data_komisariat()
    {
        $list = $this->komisariat_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->deskripsi;
            $row[] = '
                <a href="'.base_url('komisariat/detail/'.$field->id).'" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i> Detail</a>
                <a href="'.base_url('komisariat/edit/'.$field->id).'" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Edit</a>
                <a href="'.base_url('komisariat/hapus/'.$field->id).'" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus</a>

                ';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->komisariat_m->count_all(),
            "recordsFiltered" => $this->komisariat_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    // DATATABLES
    

    // FORM EKSEKUSI
    public function tambah()
    {   
        //Mencegah user yang bukan haknya
        $previllage = 4;
        check_super_user($this->fungsi->user_login()->tipe_user,$previllage);

        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[3]|is_unique[tb_komisariat.nama]|is_unique[tb_komisariat.nama]|max_length[100]');
        $this->form_validation->set_rules('email', 'email', 'min_length[3]|is_unique[tb_komisariat.email]|is_unique[tb_komisariat.email]');
        $this->form_validation->set_rules('kontak', 'kontak', 'min_length[3]|is_unique[tb_komisariat.kontak]|is_unique[tb_komisariat.kontak]|max_length[15]|alpha_dash');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Tambah Data komisariat";
            $this->templateadmin->load('template/dashboard','komisariat/tambah',$data);
        } else {
            $post = $this->input->post(null, TRUE);         
            $this->komisariat_m->simpan($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Data komisariat Berhasil Ditambahkan');
            }   
            redirect('komisariat');             
        }
    }

    public function edit($id)
    {           
        //Mencegah user yang bukan haknya
        $previllage = 4;
        check_super_user($this->fungsi->user_login()->tipe_user,$previllage);

        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[100]');
        $this->form_validation->set_rules('email', 'email', 'min_length[3]');
        $this->form_validation->set_rules('kontak', 'kontak', 'min_length[3]|is_unique[tb_komisariat.kontak]|is_unique[tb_komisariat.kontak]|max_length[15]|alpha_dash');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->komisariat_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $data['menu'] = "Edit Data komisariat";          
                $this->templateadmin->load('template/dashboard','komisariat/edit',$data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
                echo "<script>window.location='".site_url('komisariat')."';</script>";
            }

        } else {
          $post = $this->input->post(null, TRUE);
          $this->komisariat_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Berhasil Di Edit');
            }           
            redirect('komisariat');
        }
    }

    function hapus(){
        //Mencegah user yang bukan haknya
        $previllage = 4;
        check_super_user($this->session->tipe_user,$previllage);
        
        $id = $this->uri->segment(3);        
        $this->komisariat_m->hapus($id);
        $this->session->set_flashdata('danger','Berhasil Di Hapus');
        redirect('komisariat');
    }



    
 
}