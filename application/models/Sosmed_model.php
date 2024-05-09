<?php
class Sosmed_model extends CI_Model {
    public function getLinkIg() {
        $query = $this->db->get_where('social_media', array('id_sosmed' => 1));
        return $query->row_array();
    }
    public function getLinkFb() {
        $query = $this->db->get_where('social_media', array('id_sosmed' => 2));
        return $query->row_array();
    }
    public function getLinkTlp() {
        $query = $this->db->get_where('social_media', array('id_sosmed' => 3));
        return $query->row_array();
    }
    public function getLinkEmail() {
        $query = $this->db->get_where('social_media', array('id_sosmed' => 4));
        return $query->row_array();
    }

    public function getSosmedById($id_sosmed) {
        $query = $this->db->get_where('social_media', array('id_sosmed' => $id_sosmed));
        return $query->row_array();
    }

    public function updateSosmed($id, $sosmed_data) {
        $this->db->where('id_sosmed', $id);
        return $this->db->update('social_media', $sosmed_data);
    }
}
?>
