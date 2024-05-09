<?php
class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function cekNomor($nomor)
    {
        // Lakukan pencarian nomor dalam database
        $this->db->where('nomor', $nomor);
        $query = $this->db->get('user');

        // Jika nomor ditemukan, return true (nomor sudah ada)
        if ($query->num_rows() > 0) {
            return true;
        }

        // Jika nomor tidak ditemukan, return false (nomor belum ada)
        return false;
    }
    
    public function login($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user'); // Ganti 'users' dengan nama tabel pengguna Anda

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function getUserById($id_user) {
        $query = $this->db->get_where('user', array('id_user' => $id_user));
        return $query->row_array();
    }

    public function updateUser($user_id, $update_data) {
        // Update data pengguna berdasarkan ID pengguna
        $this->db->where('id_user', $user_id);
        $this->db->update('user', $update_data);

        // Return status update
        return $this->db->affected_rows() > 0;
    }
}
?>
