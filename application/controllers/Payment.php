<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Midtrans\Config;
use Midtrans\Snap;

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load library Midtrans
        require_once APPPATH . 'third_party/midtrans-php/vendor/autoload.php';
        $this->load->model('Tagihan_model');
    }

    public function index() {
        // Set konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-yRgzYvgVFqt1I_2t7aLIY8OK';
        Config::$isProduction = false; // Set true for Production Environment
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $total = $this->input->post('total');
        $id = $this->input->post('id');
        $items = $this->input->post('items');
        $nama = $this->input->post('nama');
        $tlp = $this->input->post('tlp');
        $email = $this->input->post('email');

        if (!is_numeric($total) || $total < 0.01) {
            // Jika gross_amount tidak valid, tampilkan pesan kesalahan
            echo "Jumlah pembayaran tidak valid";
            return;
        }

        // Data transaksi
        $params = array(
            'transaction_details' => array(
                'order_id' => $id,
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => $nama,
                'email' => $email,
                'phone' => $tlp,
            ),
            'finish_redirect_url' => 'http://localhost/webkost/index.php/user',
        );

        // Dapatkan Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Kirim token ke view
        $data['snapToken'] = $snapToken;

        $updateT = array(
            'metode_pembayaran' => 'Qris',
            'status_pembayaran' => 'Lunas',
            'status_konfirmasi' => 'konfirmasi',
            'tanggal_konfirmasi' => date('Y-m-d'),
        );

        $updatetrans = $this->Tagihan_model->updateTransaksi($id, $updateT);

        // Tampilkan halaman pembayaran
        $this->load->view('pembayaran/payment_form', $data);
    }

    public function finish() {
        
        $this->load->view('user');
    }
}
