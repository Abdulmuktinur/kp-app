<?php

class Pedagang_model extends CI_Model
{
    public function getAllPedagang()
    {
        return $this->db->get('pedagang')->result_array();
    }

    public function get_id_stan($id_stan)
    {
        $sql = $this->db->get_where('stan_pasar', array('id_stan' => $id_stan));
        return $sql->result();
    }

    public function tambahDataPedagang()
    {
        $data = [
            "noip" => $this->input->post('noip', true),
            "nik" => $this->input->post('nik', true),
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
            "no_handphone" => $this->input->post('no_handphone', true)
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
            "nik" => $this->input->post('nik', true),
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
            "no_handphone" => $this->input->post('no_handphone', true)
        ];


        $this->db->where('id_pedagang', $this->input->post('id_pedagang'));
        $this->db->update('pedagang', $data);
    }

    // public function cariDataPedagang()
    // {
    //     $key_pedagang = $this->input->post('key_pedagang', true);
    // }

    
    
    public function getPedagang($limit, $start, $key_pedagang = null)
    { 
        
        // $this->db->join('stan_pasar', 'pedagang.id_pedagang = stan_pasar.id_stan','left');
        if ($key_pedagang) {
            $this->db->select('pedagang.*, stan_pasar.id_stan, stan_pasar.nomor_stan');
            $this->db->join('stan_pasar', 'pedagang.id_stan = stan_pasar.id_stan');
            
            $this->db->like('pedagang.nama', $key_pedagang);
            $this->db->or_like('pedagang.noip', $key_pedagang);
            // $this->db->or_like('nik', $key_pedagang);
            // $this->db->or_like('jenis_kelamin', $key_pedagang);
            // $this->db->or_like('tempat_lahir', $key_pedagang);
            // $this->db->limit($limit,$start);
            // return $this->db->get()->result_array();
        }
        else{
            $this->db->select('pedagang.*, stan_pasar.id_stan, stan_pasar.nomor_stan');
            $this->db->from('pedagang');
            $this->db->join('stan_pasar', 'pedagang.id_stan = stan_pasar.id_stan');
            $this->db->limit($limit,$start);
            return $this->db->get()->result_array();
        }
        return $this->db->get('pedagang',$limit, $start)->result_array();
    }
    
    // public function countAllPedagang()
    // {
        //     return $this->db->get('pedagang')->num_rows();
        // }
        
        public function getData($start, $key_pedagang = null)
        {
            if ($key_pedagang) {
                $this->db->select('pedagang.*, stan_pasar.id_stan, stan_pasar.nomor_stan');
                $this->db->join('stan_pasar', 'pedagang.id_stan = stan_pasar.id_stan');
                
                $this->db->like('nama', $key_pedagang);
                $this->db->or_like('nik', $key_pedagang);
                return $this->db->get('pedagang')->result_array();
            }
            else{
                $this->db->select('pedagang.*, stan_pasar.id_stan, stan_pasar.nomor_stan');
                $this->db->from('pedagang');
                $this->db->join('stan_pasar', 'pedagang.id_stan = stan_pasar.id_stan');
                $this->db->limit($start);
                return $this->db->get()->result_array();
            }
            return $this->db->get('pedagang', $start)->result_array();
        }

        public function get_pedagang()
        {
            $query = $this->db->get('pedagang');
            return $query->result_array();
        }
        
        public function get_stan_pasar()
        {
            $query = $this->db->get('stan_pasar');
            return $query->result_array();
        }
    }
