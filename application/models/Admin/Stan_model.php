<?php

class Stan_model extends CI_Model
{
    public function getAllStan()
    {
        return $this->db->get('stan_pasar')->result_array();
    }

    public function tambahDataStan()
    {
        $data = [
            "nomor_stan" => $this->input->post('nomor_kios', true),
            "lokasi_stan" => $this->input->post('lokasi_stan', true),
            "biaya_stan" => $this->input->post('biayas_stan', true),
        ];

        $this->db->insert('stan_pasar', $data);
    }

    public function hapusDataStan($id)
    {
        // $this->db->where('id_stan_pasar', $id);
        $this->db->delete('stan_pasar', ['id_stan' => $id]);
    }

    public function getStanById($id)
    {
        return $this->db->get_where('stan_pasar', ['id_stan' => $id])->row_array();
    }

    public function ubahDataStan()
    {
        $data = [
            "id_stan" => $this->input->post('id_stan', true),
            "nomor_stan" => $this->input->post('nomor_kios', true),
            "lokasi_stan" => $this->input->post('lokasi_stan', true),
            "biaya_stan" => $this->input->post('biaya_stan', true),
        ];

        $this->db->where('id_stan', $this->input->post('id_stan'));
        $this->db->update('stan_pasar', $data);
    }


    public function getStan($limit, $start, $key_stan = null)
    {

        if ($key_stan) {
            $this->db->like('nomor_stan', $key_stan);
            $this->db->or_like('lokasi_stan', $key_stan);
            // $this->db->or_like('NIP', $key_stan);
            // $this->db->or_like('NPWP', $key_stan);
            // $this->db->or_like('jenis_kelamin', $key_stan);
        }
        return $this->db->get('stan_pasar', $limit, $start)->result_array();
    }

    public function countAllStan()
    {
        return $this->db->get('stan_pasar')->num_rows();
    }
}
