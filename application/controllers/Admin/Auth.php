<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Admin Pasar';
        $this->load->view('admin/templates/auth_header', $data);
        $this->load->view('admin/akun/login');
        $this->load->view('admin/templates/auth_footer');
    }

    public function registrasi()
    {
        $data['judul'] = 'Form Registrasi';
        $this->load->view('admin/templates/auth_header',$data);
        $this->load->view('admin/akun/registrasi');
        $this->load->view('admin/templates/auth_footer');
    }
}
