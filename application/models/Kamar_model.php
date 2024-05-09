<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {

    public function getKamarByKosan($id_kosan) {
        $this->db->where('id_kosan', $id_kosan);
        $query = $this->db->get('kamar');
        return $query->result_array();
    }

    public function getKamarBykamar($id_kosan) {
        $this->db->where('id_kosan', $id_kosan);
        $query = $this->db->get('kamar');
        return $query->result_array();
    }

    public function addKamar($data) {
        $this->db->insert('kamar', $data);
        return $this->db->insert_id();
    }

    public function getKamarById($id_kamar) {
        $query = $this->db->get_where('kamar', array('id_kamar' => $id_kamar));
        return $query->row_array();
    }

    public function updateKamar($id, $kamar_data) {
        $this->db->where('id_kamar', $id);
        return $this->db->update('kamar', $kamar_data);
    }

    public function deleteKamar($id_kamar) {
        return $this->db->delete('kamar', array('id_kamar' => $id_kamar));
    }
}
