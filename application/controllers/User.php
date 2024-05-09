<?php 
class User extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Tagihan_model');
        $this->load->model('Penghuni_model');
        $this->load->model('User_model');
        $this->load->model('Kamar_model');
        $this->load->model('Kosan_model');
    }

    public function index(){
        if (!$this->session->userdata('admin_logged_in') && !$this->session->userdata('user_logged_in')) {
            redirect('/');
        }
        $id_user = $this->session->userdata('user_id');

        $data['invoices'] = $this->Tagihan_model->getAllInvoices();
        $data['out'] = $this->Tagihan_model->getCheckout();
        $data['id'] = $this->Penghuni_model->getPenghuniByUser($id_user);
        $data['cek'] = $this->Penghuni_model->checkPenghuni($id_user);
        $data['getUser'] = $this->User_model->getUserById($id_user);
        $data['kamar'] = $this->Kamar_model->getKamarById($data['id']['id_kamar']);
        $data['kosan'] = $this->Kosan_model->getKosanById($data['kamar']['id_kosan']);

        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('user/dashboard',$data);
        $this->load->view('admin/layout/footer.php');
    }

    public function detail($id_transaksi){
        if (!$this->session->userdata('admin_logged_in') && !$this->session->userdata('user_logged_in')) {
            redirect('/');
        }

        $data['invoice'] = $this->Tagihan_model->getInvoiceById($id_transaksi);
        $data['penghuni'] = $this->Penghuni_model->getPenghuniById($data['invoice']['id_penghuni']);
        $data['email'] = $this->session->userdata('email');
        $data['periode_in'] = date('d F Y', strtotime($data['invoice']['tanggal_check_in']));
        $data['periode_out'] = date('d F Y', strtotime($data['invoice']['tanggal_check_out']));
        $data['tarif'] = "Rp " . number_format($data['invoice']['total_biaya'], 0, ',', '.');
        
        if ($data['invoice']) {
            $tanggal_check_in = date('d F Y', strtotime('+10 days', strtotime($data['invoice']['tanggal_check_in'])));
    
            $data['invoice']['tanggal_check_in_plus_10'] = $tanggal_check_in;
        }
    

        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('user/detail_transaksi',$data);
        $this->load->view('admin/layout/footer.php');
    }

    public function invoice_print($id_transaksi)
	{
		$data['invoice'] = $this->Tagihan_model->getInvoiceById($id_transaksi);
        $data['penghuni'] = $this->Penghuni_model->getPenghuniById($data['invoice']['id_penghuni']);
        $data['email'] = $this->session->userdata('email');
        $data['periode_in'] = date('d F Y', strtotime($data['invoice']['tanggal_check_in']));
        $data['periode_out'] = date('d F Y', strtotime($data['invoice']['tanggal_check_out']));
        $data['tarif'] = "Rp " . number_format($data['invoice']['total_biaya'], 0, ',', '.');
        
        if ($data['invoice']) {
            $tanggal_check_in = date('d F Y', strtotime('+10 days', strtotime($data['invoice']['tanggal_check_in'])));
    
            $data['invoice']['tanggal_check_in_plus_10'] = $tanggal_check_in;
        }

		$this->load->view('cetak/invoice-print', $data);
	}

    public function invoice_pdf($id_transaksi)
	{
		$this->load->library('Dompdf_gen');

		$data['invoice'] = $this->Tagihan_model->getInvoiceById($id_transaksi);
        $data['penghuni'] = $this->Penghuni_model->getPenghuniById($data['invoice']['id_penghuni']);
        $data['email'] = $this->session->userdata('email');
        $data['periode_in'] = date('d F Y', strtotime($data['invoice']['tanggal_check_in']));
        $data['periode_out'] = date('d F Y', strtotime($data['invoice']['tanggal_check_out']));
        $data['tarif'] = "Rp " . number_format($data['invoice']['total_biaya'], 0, ',', '.');
        
        if ($data['invoice']) {
            $tanggal_check_in = date('d F Y', strtotime('+10 days', strtotime($data['invoice']['tanggal_check_in'])));
    
            $data['invoice']['tanggal_check_in_plus_10'] = $tanggal_check_in;
        }

		$this->load->view('cetak/invoice-pdf', $data);

		$paper = 'A4';
		$orien = 'landscape';
		$html = $this->output->get_output();
		
		$this->dompdf->set_paper($paper, $orien);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('invoice_BayarKost.pdf');
	}
}

?>