<?php

class Laporan_model extends CI_Model
{
    public function getAllLaporan()
    {
        return $this->db->get('laporan_harian')->result_array();
    }

    public function get_id_satuan($id_satuan)
    {
        $sql = $this->db->get_where('satuan', array('id_satuan' => $id_satuan));
        return $sql->result();
    }

    public function tambahDataLaporan()
    {
        $data = [
            "nama_komoditas" => $this->input->post('nama_komoditas', true),
            "harga_pangan" => $this->input->post('harga_pangan', true)
        ];

        $this->db->insert('laporan_harian', $data);
    }

    public function hapusDataLaporan($id)
    {
        // $this->db->where('id_laporan', $id);
        $this->db->delete('laporan_harian', ['id_laporan' => $id]);
    }

    public function getLaporanById($id)
    {
        return $this->db->get_where('laporan_harian', ['id_laporan' => $id])->row_array();
    }

    public function ubahDataLaporan()
    {
        $data = [
            "id_laporan" => $this->input->post('id_laporan', true),
            "kode_barang" => $this->input->post('kode_barang', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga" => $this->input->post('nama_barang', true)
        ];

        $this->db->where('id_laporan', $this->input->post('id_laporan'));
        $this->db->update('laporan_harian', $data);
    }

    // public function cariDataLaporan()
    // {
    //     $key_komoditas = $this->input->post('key_komoditas', true);
    // }

    public function getLaporan($limit, $start, $laporan_harian = null)
    {
        if ($laporan_harian) {
            // $this->db->select('pedagang.*, stan_pasar.id_stan, stan_pasar.nomor_stan');
            // $this->db->join('stan_pasar', 'pedagang.id_stan = stan_pasar.id_stan');
            $this->db->select('laporan_harian.*, satuan.id_satuan, satuan.satuan');
            $this->db->join('satuan', 'laporan_harian.id_satuan = satuan.id_satuan');

            $this->db->like('nama_komoditas', $laporan_harian);
            $this->db->or_like('harga_pangan', $laporan_harian);
            // $this->db->or_like('NIP', $key_komoditas);
            // $this->db->or_like('NPWP', $key_komoditas);
            // $this->db->or_like('jenis_kelamin', $key_komoditas);
            // return $this->db->get('barang')->result_array();
        }
        else{
            $this->db->select('laporan_harian.*, satuan.id_satuan, satuan.satuan');
            $this->db->from('laporan_harian');
            $this->db->join('satuan', 'laporan_harian.id_satuan = satuan.id_satuan');
            $this->db->limit($limit,$start);
            return $this->db->get()->result_array();
        }
        return $this->db->get('laporan_harian', $limit, $start)->result_array();
    }

    public function countAllKomoditas()
    {
        return $this->db->get('laporan_harian')->num_rows();
    }

    public function get_laporan()
    {
        $query = $this->db->get('laporan_harian');
        return $query->result_array();
    }

    public function get_satuan()
    {
        $query = $this->db->get('satuan');
        return $query->result_array();
    }
}
