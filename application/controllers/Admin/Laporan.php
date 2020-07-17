<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Laporan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['judul'] = 'Admin | Laporan harian';
        //load
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('cari')) {
            
            $data['key_laporan'] = $this->input->post('key_laporan');
            $this->session->set_userdata('key_laporan', $data['key_laporan']);
            
        } else {
            $data['key_laporan'] = $this->session->userdata('key_laporan');
           
        }

        $config['base_url'] = 'http://localhost/kp-app/Admin/Laporan/index';
        // $config['total_rows'] = $this->Pegawai_model->countAllPegawai();

        $this->db->like('nama_komoditas', $data['key_laporan']);
        $this->db->or_like('harga_pangan', $data['key_laporan']);
        $this->db->from('laporan_harian');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;


        //initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(4);
        $data['laporan'] = $this->Laporan_model->getLaporan($config['per_page'], $data['start'], $data['key_laporan']);
        
        //$data['satuan'] = $this->Laporan_model->get_satuan();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporan_harian/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah()
    {
        // $data['judul'] = 'Form Tambah Data Pegawai';

        $this->Laporan_model->get_satuan();
        $this->form_validation->set_rules('nama_komoditas', 'Nama Komoditas', 'required|numeric');
        $this->form_validation->set_rules('harga_pangan', 'Nama Barang', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/laporan_harian/tambah');
            $this->load->view('admin/templates/footer');
        } else {
            $this->Komoditas_model->tambahDataLaporan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/Laporan');
        }
    }

    public function hapus($id)
    {
        $this->Laporan_model->hapusDataLaporan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Admin/Laporan');
    }

    public function detail($id)
    {
        // $data['judul'] = 'Detail Data Mahasiswa';
        $data['laporan'] = $this->Laporan_model->getLaporanById($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporan_harian/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    public function ubah($id)
    {
        //$data['judul'] = 'Form Ubah Data Pegawai';
        $data['laporan'] = $this->Laporan_model->getLaporanById($id);

        $this->form_validation->set_rules('nama_komoditas', 'Nama Komoditas', 'required');
        $this->form_validation->set_rules('harga_pangan', 'Harga', 'required|numeric');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/laporan_harian/ubah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->Stan_model->ubahDataKomoditas();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Admin/Laporan');
        }
    }

    public function laporan_pdf()
    {

        $data['judul'] = 'Laporan Harian';

        //     //ambil data keyword
        if ($this->input->post('cari')) {
            $data['key_laporan'] = $this->input->post('key_laporan');
            $this->session->set_userdata('key_laporan', $data['key_laporan']);
        } else {
            $data['key_laporan'] = $this->session->userdata('key_laporan');
        }

        $this->db->like('nama_komoditas', $data['key_laporan']);
        $this->db->or_like('harga_pangan', $data['key_laporan']);

        $data['start'] = $this->uri->segment(4);
        $data['laporan'] = $this->Laporan_model->getLaporan($data['start'], $data['key_laporan']);

        $this->load->library('Pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Laporan Harian";
        $html = $this->pdf->load_view('admin/laporan_harian/print_data', $data);
        $this->Pdf->stream($html, $$filename);
    }
}
