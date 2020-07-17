<?php

class Pedagang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Pedagang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['judul'] = 'Admin | Data Pedagang';

        //$data['pegawai'] = $this->Pegawai_model->getAllPegawai();

        //load
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('cari')) {
            $data['key_pedagang'] = $this->input->post('key_pedagang');
            $this->session->set_userdata('key_pedagang', $data['key_pedagang']);
        } else {
            $data['key_pedagang'] = $this->session->userdata('key_pedagang');
        }

        // $config['total_rows'] = $this->Pegawai_model->countAllPegawai();

        $this->db->like('nama', $data['key_pedagang']);
        $this->db->or_like('noip', $data['key_pedagang']);
        $this->db->from('pedagang');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;


        //initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(4);
        $data['pedagang'] = $this->Pedagang_model->getPedagang($config['per_page'], $data['start'], $data['key_pedagang']);
        // $data['stan_pasar'] = $this->Pedagang_model->get_stan_pasar();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pedagang/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah()
    {
        // $data['judul'] = 'Form Tambah Data Pedagang';

        $this->Laporan_model->get_stan_pasar();

        $this->form_validation->set_rules('noip', 'Nomor induk pedagang', 'required|numeric');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_handphone', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/pedagang/tambah');
            $this->load->view('admin/templates/footer');
        } else {
            $this->Pedagang_model->tambahDataPedagang();

            redirect('Admin/Pedagang');
        }
    }

    public function hapus($id)
    {
        $this->Pedagang_model->hapusDataPedagang($id);
        redirect('Admin/Pedagang');
    }

    public function detail($id)
    {
        // $data['judul'] = 'Detail Data Mahasiswa';
        $data['pedagang'] = $this->Pedagang_model->getPedagangById($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pedagang/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    public function ubah($id)
    {
        // $data['judul'] = 'Form Ubah Data Pedagang';
        $data['pedagang'] = $this->Pedagang_model->getPedagangById($id);


        $this->form_validation->set_rules('noip', 'Nomor induk pedagang', 'required|numeric');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_handphone', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/pedagang/ubah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->Pedagang_model->ubahDataPedagang();
            redirect('Admin/Pedagang');
        }
    }

    public function laporan_pdf()
    {

        $data['judul'] = 'Rekap data pedagang';

        //     //ambil data keyword
        if ($this->input->post('cari')) {
            $data['key_pedagang'] = $this->input->post('key_pedagang');
            $this->session->set_userdata('key_pedagang', $data['key_pedagang']);
        } else {
            $data['key_pedagang'] = $this->session->userdata('key_pedagang');
        }

        $this->db->like('nama', $data['key_pedagang']);
        $this->db->or_like('nik', $data['key_pedagang']);

        $data['start'] = $this->uri->segment(4);
        $data['pedagang'] = $this->Pedagang_model->getData($data['start'], $data['key_pedagang']);

        $this->load->library('Pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Rekap data pedagang";
        $html = $this->pdf->load_view('admin/pedagang/print_data', $data);
        $this->Pdf->stream($html, $$filename);
    }
}
