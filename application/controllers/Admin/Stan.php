<?php

class Stan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Stan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Admin | Data stan';

        //load
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('cari')) {
            $data['key_stan'] = $this->input->post('key_stan');
            $this->session->set_userdata('key_stan', $data['key_stan']);
        } else {
            $data['key_stan'] = $this->session->userdata('key_stan');
        }

        $config['base_url'] = 'http://localhost/kp-app/Admin/Stan/index';
        // $config['total_rows'] = $this->Pegawai_model->countAllPegawai();

        $this->db->like('nomor_stan', $data['key_stan']);
        $this->db->or_like('lokasi_stan', $data['key_stan']);
        $this->db->from('stan_pasar');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;


        //initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(4);
        $data['stan'] = $this->Stan_model->getStan($config['per_page'], $data['start'], $data['key_stan']);



        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/stan/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah()
    {


        $this->Stan_model->get_pedagang();
        $this->form_validation->set_rules('nomor_stan', 'Nomor Kios', 'required|numeric');
        $this->form_validation->set_rules('lokasi_stan', 'Lokasi Stan', 'required|numeric');
        $this->form_validation->set_rules('biaya_stan', 'Biaya Stan', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/stan/tambah');
            $this->load->view('admin/templates/footer');
        } else {
            $this->Stan_model->tambahDataStan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Admin/Stan');
        }
    }

    public function hapus($id)
    {
        $this->Stan_model->hapusDataStan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Admin/Stan');
    }

    public function detail($id)
    {
        // $data['judul'] = 'Detail Data Mahasiswa';
        $data['stan'] = $this->Stan_model->getStanById($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/stan/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    public function ubah($id)
    {
        //$data['judul'] = 'Form Ubah Data Pegawai';
        $data['stan'] = $this->Stan_model->getStanById($id);

        $this->form_validation->set_rules('nomor_stan', 'Nomor Kios', 'required|numeric');
        $this->form_validation->set_rules('lokasi_stan', 'Lokasi Stan', 'required|numeric');
        $this->form_validation->set_rules('biaya_stan', 'Biaya Stan', 'required|numeric');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/stan/ubah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->Stan_model->ubahDataStan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Admin/Stan');
        }
    }

    public function laporan_pdf()
    {

        $data['judul'] = 'Rekap data stan';

        //     //ambil data keyword
        if ($this->input->post('cari')) {
            $data['key_stan'] = $this->input->post('key_stan');
            $this->session->set_userdata('key_stan', $data['key_stan']);
        } else {
            $data['key_stan'] = $this->session->userdata('key_stan');
        }

        $this->db->like('nomor_stan', $data['key_stan']);
        $this->db->or_like('lokasi_stan', $data['key_stan']);

        $data['start'] = $this->uri->segment(4);
        $data['stan'] = $this->Stan_model->getStan($data['start'], $data['key_stan']);

        $this->load->library('Pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Rekap data stan";
        $html = $this->pdf->load_view('admin/laporan_harian/print_data', $data);
        $this->Pdf->stream($html, $$filename);
    }
}
