<?php

class Pegawai extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User/Pegawai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data['judul'] = 'Daftar Pegawai';
        
        //$data['pegawai'] = $this->Pegawai_model->getAllPegawai();
        
        //load
        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/kp-app/User/Pegawai/index';
        
        //ambil data keyword
        if ($this->input->post('cari') )
        {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } 
        else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        
        // $config['total_rows'] = $this->Pegawai_model->countAllPegawai();
        
        $this->db->like('nama', $data['keyword']);
        $this->db->from('pegawai');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        
        
        //initialize
        $this->pagination->initialize($config);
        
        
        $data['start'] = $this->uri->segment(4);
        $data['pegawai'] = $this->Pegawai_model->getPegawai($config['per_page'], $data['start'], $data['keyword']);
        

        $this->load->view('templates/header', $data);
        $this->load->view('user/pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Pegawai';
        

        $this->form_validation->set_rules('NIP','NIP', 'required|numeric');
        $this->form_validation->set_rules('NIK','NIK', 'required|numeric');
        $this->form_validation->set_rules('NPWP','NPWP', 'required|numeric');
        $this->form_validation->set_rules('nama','Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat','Alamat', 'required');
        $this->form_validation->set_rules('no_telepone','Nomor Telepon', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('user/pegawai/tambah');
            $this->load->view('templates/footer');
        }else{
            $this->Pegawai_model->tambahDataPegawai();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('User/Pegawai');
        }
    }

    public function hapus($id)
    {
        $this->Pegawai_model->hapusDataPegawai($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('User/Pegawai');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('user/pegawai/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Pegawai';
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($id);
        

        $this->form_validation->set_rules('NIP','NIP', 'required|numeric');
        $this->form_validation->set_rules('NIK','NIK', 'required|numeric');
        $this->form_validation->set_rules('NPWP','NPWP', 'required|numeric');
        $this->form_validation->set_rules('nama','Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat','Alamat', 'required');
        $this->form_validation->set_rules('no_telepone','Nomor Telepon', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('user/pegawai/ubah', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Pegawai_model->ubahDataPegawai();
            $this->session->set_flashdata('flash','Diubah');
            redirect('User/Pegawai');
        }
    }

}