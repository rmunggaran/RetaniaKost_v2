<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kosan_model extends CI_Model {
    public function getRecentKosan($limit = 6) {
        $this->db->order_by('id_kosan', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('kosan');
        return $query->result_array();
    }

    public function getKosanById($id) {
        $this->db->where('id_kosan', $id);
        $query = $this->db->get('kosan');
        return $query->row_array();
    }

    public function getKamarsByKosanId($id_kosan) {
        $this->db->where('id_kosan', $id_kosan);
        $query = $this->db->get('kamar');
        return $query->result_array();
    }

    public function getKamarsById($id_kamar) {
        $query = $this->db->get_where('kamar', array('id_kamar' => $id_kamar));
        return $query->row_array();
    }

    public function searchKosan($keyword) {
        $this->db->like('nama_kosan', $keyword);
        $this->db->or_like('wilayah', $keyword);
        $query = $this->db->get('kosan');
        return $query->result_array();
    }

    public function tambahKosan($data) {
        return $this->db->insert('kosan', $data);
    }


    public function hapusKosan($id_kosan) {
        $this->db->where('id_kosan', $id_kosan);
        $this->db->delete('kosan');
    
        return $this->db->affected_rows() > 0;
    }

    public function getKosanByIdupdate($id)
    {
        $query = $this->db->get_where('kosan', array('id_kosan' => $id));
        return $query->row_array();
    }

    public function updateKosan($id, $update_data)
    {
        $this->db->where('id_kosan', $id);
        return $this->db->update('kosan', $update_data);
    }
    
    public function getJumlahKosan(){
        return $this->db->count_all('kosan');
    }

    public function getJumlahpenghuni(){
        return $this->db->count_all('penghuni');
    }
    
}
