<?php

class Pedagang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User/Pedagang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['judul'] = 'Daftar Pedagang';

        //$data['pegawai'] = $this->Pegawai_model->getAllPegawai();

        //load
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('cari')) {
            $data['keyword_pedagang'] = $this->input->post('keyword_pedagang');
            $this->session->set_userdata('keyword_pedagang', $data['keyword_pedagang']);
        } else {
            $data['keyword_pedagang'] = $this->session->userdata('keyword_pedagang');
        }

        // $config['total_rows'] = $this->Pegawai_model->countAllPegawai();

        $this->db->like('nama', $data['keyword_pedagang']);
        $this->db->from('pedagang');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;


        //initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(4);
        $data['pedagang'] = $this->Pedagang_model->getPedagang($config['per_page'], $data['start'], $data['keyword_pedagang']);


        $this->load->view('templates/header', $data);
        $this->load->view('user/pedagang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Pedagang';


        $this->form_validation->set_rules('noip', 'Nomor induk pedagang', 'required|numeric');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepone', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/pedagang/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Pedagang_model->tambahDataPedagang();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('User/Pedagang');
        }
    }

    public function hapus($id)
    {
        $this->Pedagang_model->hapusDataPedagang($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('User/Pedagang');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['pedagang'] = $this->Pedagang_model->getPedagangById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('user/pedagang/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Pedagang';
        $data['pedagang'] = $this->Pedagang_model->getPedagangById($id);


        $this->form_validation->set_rules('noip', 'Nomor induk pedagang', 'required|numeric');
        $this->form_validation->set_rules('NIK', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepone', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/pedagang/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pedagang_model->ubahDataPedagang();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('User/Pedagang');
        }
    }
}
