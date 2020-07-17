<?php

class Pedagang_model extends CI_Model
{
    public function getAllPedagang()
    {
        return $this->db->get('pedagang')->result_array();
    }

    public function tambahDataPedagang()
    {
        $data = [
            "noip" => $this->input->post('noip', true),
            "NIK" => $this->input->post('NIK', true),
            "nama" => $this->input->post('nama', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telepone" => $this->input->post('no_telepone', true)
        ];

        $this->db->insert('pedagang', $data);
    }

    public function hapusDataPedagang($id)
    {
        // $this->db->where('id_pegawai', $id);
        $this->db->delete('pedagang', ['id_pedagang' => $id]);
    }

    public function getPedagangById($id)
    {
        return $this->db->get_where('pedagang', ['id_pedagang' => $id])->row_array();
    }

    public function ubahDataPedagang()
    {
        $data = [
            "noip" => $this->input->post('noip', true),
            "NIK" => $this->input->post('NIK', true),
            "nama" => $this->input->post('nama', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telepone" => $this->input->post('no_telepone', true)
        ];

        $this->db->where('id_pedagang', $this->input->post('id_pedagang'));
        $this->db->update('pedagang', $data);
    }

    public function cariDataPedagang()
    {
        $keyword = $this->input->post('keyword', true);
    }

    public function getPedagang($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('NIK', $keyword);
            $this->db->or_like('noip', $keyword);
            $this->db->or_like('jenis_kelamin', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('tempat_lahir', $keyword);
            return $this->db->get('pedagang')->result_array();
        }
        return $this->db->get('pedagang', $limit, $start)->result_array();
    }

    public function countAllPedagang()
    {
        return $this->db->get('pedagang')->num_rows();
    }
}
