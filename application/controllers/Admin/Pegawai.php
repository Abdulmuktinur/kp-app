<?php

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Pegawai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['judul'] = 'Admin | Data Pegawai';

        //$data['pegawai'] = $this->Pegawai_model->getAllPegawai();

        //load
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('cari')) {
            $data['key_pegawai'] = $this->input->post('key_pegawai');
            $this->session->set_userdata('key_pegawai', $data['key_pegawai']);
        } else {
            $data['key_pegawai'] = $this->session->userdata('key_pegawai');
        }

        $config['base_url'] = 'http://localhost/kp-app/Admin/Pegawai/index';
        // $config['total_rows'] = $this->Pegawai_model->countAllPegawai();

        $this->db->like('nama', $data['key_pegawai']);
        $this->db->or_like('NIK', $data['key_pegawai']);
        $this->db->from('pegawai');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;


        //initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(4);
        $data['pegawai'] = $this->Pegawai_model->getPegawai($config['per_page'], $data['start'], $data['key_pegawai']);


        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pegawai/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah()
    {
        // $data['judul'] = 'Form Tambah Data Pegawai';


        $this->form_validation->set_rules('NIP', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('NIK', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('NPWP', 'NPWP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepone', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/pegawai/tambah');
            $this->load->view('admin/templates/footer');
        } else {
            $this->Pegawai_model->tambahDataPegawai();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/Pegawai');
        }
    }

    public function hapus($id)
    {
        $this->Pegawai_model->hapusDataPegawai($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Admin/Pegawai');
    }

    public function detail($id)
    {
        // $data['judul'] = 'Detail Data Mahasiswa';
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pegawai/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    public function ubah($id)
    {
        //$data['judul'] = 'Form Ubah Data Pegawai';
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($id);


        $this->form_validation->set_rules('NIP', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('NIK', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('NPWP', 'NPWP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepone', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/pegawai/ubah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->Pegawai_model->ubahDataPegawai();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Admin/Pegawai');
        }
    }

    public function laporan_pdf()
    {

        $data['judul'] = 'Rekap data pegawai';

        //     //ambil data keyword
        if ($this->input->post('cari')) {
            $data['key_pegawai'] = $this->input->post('key_pegawai');
            $this->session->set_userdata('key_pegawai', $data['key_pegawai']);
        } else {
            $data['key_pegawai'] = $this->session->userdata('key_pegawai');
        }

        $this->db->like('nama', $data['key_pegawai']);
        $this->db->or_like('NIK', $data['key_pegawai']);

        $data['start'] = $this->uri->segment(4);
        $data['pegawai'] = $this->Pegawai_model->getData($data['start'], $data['key_pegawai']);

        $this->load->library('Pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Rekap data pegawai";
        $html = $this->pdf->load_view('admin/pegawai/print_data', $data);
        $this->Pdf->stream($html, $$filename);
    }
}
