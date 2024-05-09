<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {

    public function BuatInvoice($data)
    {
        $this->db->insert('transaksi', $data);

        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getAllInvoices() {
        $this->db->order_by('dibuat_pada', 'DESC');
        $query = $this->db->get('transaksi');
        return $query->result_array();
    }

    public function getInvoiceById($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
        $query = $this->db->get('transaksi');
        return $query->row_array();
    }

    public function getInvoiceByIdPenghuni($id_penghuni) {
        $this->db->where('id_penghuni', $id_penghuni);
        $query = $this->db->get('transaksi');
        return $query->row_array();
    }

    public function updateTransaksi($id, $updateT) {
        $this->db->where('id_transaksi', $id);
        return $this->db->update('transaksi', $updateT);
    }

    public function getCheckout() {
        // Ambil data penghuni yang telah check-out
        $this->db->where('tanggal_check_out <=', date('Y-m-d'));
        return $this->db->get('transaksi')->result();
    }

    public function cariTransaksi($keyword) {
        $this->db->like('id_transaksi', $keyword);
        $this->db->or_like('id_penghuni', $keyword);
        $query = $this->db->get('transaksi');
        return $query->result_array();
    }

    public function deleteTransaksi($id_penghuni) {
        // Loop through each ID and delete corresponding records
        foreach ($id_penghuni as $id) {
            $this->db->delete('transaksi', array('id_penghuni' => $id));
        }
        // Return true to indicate successful deletion
        return true;
    }
    
}
