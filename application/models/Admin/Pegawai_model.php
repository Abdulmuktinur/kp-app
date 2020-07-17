<?php

class Pegawai_model extends CI_Model
{
    public function getAllPegawai()
    {
        return $this->db->get('pegawai')->result_array();
    }

    public function tambahDataPegawai()
    {
        $data = [
            "NIP" => $this->input->post('NIP', true),
            "NIK" => $this->input->post('NIK', true),
            "NPWP" => $this->input->post('NPWP', true),
            "nama" => $this->input->post('nama', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telepone" => $this->input->post('no_telepone', true)
        ];

        $this->db->insert('pegawai', $data);
    }

    public function hapusDataPegawai($id)
    {
        // $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai', ['id_pegawai' => $id]);
    }

    public function getPegawaiById($id)
    {
        return $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();
    }

    public function ubahDataPegawai()
    {
        $data = [
            "NIP" => $this->input->post('NIP', true),
            "NIK" => $this->input->post('NIK', true),
            "NPWP" => $this->input->post('NPWP', true),
            "nama" => $this->input->post('nama', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telepone" => $this->input->post('no_telepone', true)
        ];

        $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
        $this->db->update('pegawai', $data);
    }


    public function getPegawai($limit, $start, $key_pegawai = null)
    {
        if ($key_pegawai) {
            $this->db->like('nama', $key_pegawai);
            $this->db->or_like('NIK', $key_pegawai);
            // $this->db->or_like('NIP', $keyword);
            // $this->db->or_like('NPWP', $keyword);
            // $this->db->or_like('jenis_kelamin', $keyword);
            // return $this->db->get('pegawai')->result_array();
        }
        return $this->db->get('pegawai', $limit, $start)->result_array();
    }

    public function countAllPegawai()
    {
        return $this->db->get('pegawai')->num_rows();
    }

    public function getData($start, $key_pegawai = null)
    {
        if ($key_pegawai) {
            $this->db->like('nama', $key_pegawai);
            $this->db->or_like('NIK', $key_pegawai);
            // $this->db->or_like('NIP', $keyword);
            // $this->db->or_like('NPWP', $keyword);
            // $this->db->or_like('jenis_kelamin', $keyword);
            return $this->db->get('pegawai')->result_array();
        }
        return $this->db->get('pegawai', $start)->result_array();
    }
}
