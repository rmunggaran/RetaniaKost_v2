<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni_model extends CI_Model {

    public function getRecentPenghuni() {
        $this->db->order_by('id_penghuni', 'DESC');
        $query = $this->db->get('penghuni');
        return $query->result_array();
    }

    public function getRecentKosan() {
        $this->db->order_by('id_kosan', 'DESC');
        $query = $this->db->get('kosan');
        return $query->result_array();
    }

    public function addPenghuni($data) {
        $this->db->insert('penghuni', $data);
        return $this->db->insert_id();
    }

    public function getPenghuniById($id_penghuni) {
        $query = $this->db->get_where('penghuni', array('id_penghuni' => $id_penghuni));
        return $query->row_array();
    }

    public function getPenghuniByUser($id_user) {
        $query = $this->db->get_where('penghuni', array('id_user' => $id_user));
        return $query->row_array();
    }

    public function checkPenghuni($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('penghuni');
        return $query->num_rows() > 0; // Mengembalikan true jika ada id_user dalam tabel penghuni
    }

    public function updatePenghuni($id, $penghuni_data) {
        $this->db->where('id_penghuni', $id);
        return $this->db->update('penghuni', $penghuni_data);
    }

    public function updateByIduser($id, $penghuni_data) {
        $this->db->where('id_user', $id);
        return $this->db->update('penghuni', $penghuni_data);
    }

    public function deletePenghuni($id_penghuni) {
        return $this->db->delete('penghuni', array('id_penghuni' => $id_penghuni));
    }

    public function searcPenghuni($keyword) {
        $this->db->like('nik', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('id_kamar', $keyword);
        $query = $this->db->get('penghuni');
        return $query->result_array();
    }

    public function cekPenghuni($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('penghuni');

        // Jika nomor ditemukan, return true (nomor sudah ada)
        if ($query->num_rows() > 0) {
            return true;
        }

        // Jika nomor tidak ditemukan, return false (nomor belum ada)
        return false;
    }
}
