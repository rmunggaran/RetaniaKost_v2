<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penghuni_model');
    }

    public function checkOutTransactions() {
        $this->load->model('Tagihan_model');
    
        // Mendapatkan daftar penghuni yang sudah check-out
        $checkout = $this->Tagihan_model->getCheckout();
    
        // Cek apakah ada penghuni yang check-out
        if (!empty($checkout)) {
            // Iterasi setiap penghuni yang check-out
            foreach ($checkout as $resident) {
                // Periksa apakah penghuni sudah memiliki transaksi invoice
                if ($resident->anu == 1) {
                    // Jika belum, update status penghuni
                    $id = $resident->id_transaksi;
                    $updateT = array(
                        'anu' => '2',
                    );
                    $this->Tagihan_model->updateTransaksi($id, $updateT);
    
                    // Redirect ke controller BuatInvoice untuk membuat transaksi invoice baru
                    redirect('Invoice/buatInvoice/' . $resident->id_penghuni);
                }
            }
        }
    }
    

    public function BuatInvoice($id_penghuni){
        // Memuat model
        $this->load->model('Penghuni_model');
        $this->load->model('Tagihan_model');
    
        // Mendapatkan data penghuni berdasarkan ID penghuni
        $penghuni = $this->Penghuni_model->getPenghuniById($id_penghuni);
    
        // Memeriksa apakah penghuni ditemukan
        if ($penghuni) {
            // Menyimpan ID penghuni dari hasil pengembalian array
            $id_penghuni = $penghuni['id_penghuni'];
    
            // Membuat ID transaksi
            $id_transaksi = 'OR' . uniqid();
        
            // Misalnya, Anda ingin mengambil data kamar terkait dari penghuni
            $id_kamar = $penghuni['id_kamar'];
        
            // Mendapatkan tanggal check-in (sekarang) dan check-out (sebulan dari sekarang)
            $tanggal_check_in = date('Y-m-d');
            $tanggal_check_out = date('Y-m-d', strtotime('+1 month'));
        
            // Misalnya, Anda ingin mengambil total biaya dari tabel kamar berdasarkan ID kamar
            if($penghuni['bayaran'] == 'bulan'){
                $total_biaya = $penghuni['tarif_perbulan'];
            }else{
                $total_biaya = $penghuni['tarif_pertahun'];
            }
        
            $status_pembayaran = 'Belum dibayar';
    
            // Mendapatkan tanggal invoice dibuat (sekarang)
            $dibuat_pada = date('Y-m-d');
        
            // Data invoice yang akan disimpan
            $invoice_data = array(
                'id_transaksi' => $id_transaksi,
                'id_penghuni' => $id_penghuni,
                'id_kamar' => $id_kamar,
                'tanggal_check_in' => $tanggal_check_in,
                'tanggal_check_out' => $tanggal_check_out,
                'total_biaya' => $total_biaya,
                'status_pembayaran' => $status_pembayaran,
                'dibuat_pada' => $dibuat_pada,
                'anu' => 1
            );
        
            // Memasukkan data invoice ke dalam database
            $inserted = $this->Tagihan_model->BuatInvoice($invoice_data);
        
            if ($inserted) {
                $this->session->set_flashdata('success', 'Silahkan Bayar Kosan');
                redirect('user');
            } else {
                // Jika gagal, lakukan tindakan yang sesuai, misalnya, tampilkan pesan kesalahan
                echo "Gagal membuat invoice. Silakan coba lagi.";
            }
        } else {
            // Jika penghuni tidak ditemukan, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
            echo "Penghuni tidak ditemukan. Silakan cek kembali ID penghuni.";
        }
    }
    

    
}