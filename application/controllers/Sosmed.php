<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sosmed extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Sosmed_model');
    }

	public function index()
	{
		if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $data_ig['ig'] = $this->Sosmed_model->getLinkIg();
        $data_fb['fb'] = $this->Sosmed_model->getLinkFb();
        $data_tlp['tlp'] = $this->Sosmed_model->getLinkTlp();
        $data_email['email'] = $this->Sosmed_model->getLinkEmail();

        $data_sosmed = array_merge($data_ig, $data_fb, $data_tlp, $data_email);

        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/sosmed/sosmed',$data_sosmed);
        $this->load->view('admin/layout/footer.php');
	}

    public function updateSosmed($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kamar = $this->Sosmed_model->getSosmedById($id);
    
            // Lanjutkan dengan proses penyimpanan ke database
            $tlp = $this->input->post('link');
    
            $sosmed_data = array(
                'link' => $tlp,
            );
    
            $updated = $this->Sosmed_model->updateSosmed($id, $sosmed_data);
    
            if ($updated) {
                $this->session->set_flashdata('success', 'Berhasil Memperbarui Data sosmed');
                redirect('sosmed/index');
            } else {
                $this->session->set_flashdata('error', 'Gagal Memperbarui Data sosmed');
                redirect('sosmed/index');
            }
        }
        $this->index();
    }
}
