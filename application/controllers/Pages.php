<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sosmed_model');
        $this->load->library('session');
    }

    public function index() {
        
        $this->load->model('Kosan_model');
        $data['kosan'] = $this->Kosan_model->getRecentKosan();

        $data_ig['ig'] = $this->Sosmed_model->getLinkIg();
        $data_fb['fb'] = $this->Sosmed_model->getLinkFb();
        $data_tlp['tlp'] = $this->Sosmed_model->getLinkTlp();
        $data_email['email'] = $this->Sosmed_model->getLinkEmail();

        $da = array_merge($data_ig, $data_fb, $data_tlp, $data_email);

        $this->load->view('header',$da);
        $this->load->view('home',$data);
        $this->load->view('footer');
    }

    public function kosan() {
        $this->load->model('Kosan_model');
        $data['kosan'] = $this->Kosan_model->getRecentKosan();

        $data_ig['ig'] = $this->Sosmed_model->getLinkIg();
        $data_fb['fb'] = $this->Sosmed_model->getLinkFb();
        $data_tlp['tlp'] = $this->Sosmed_model->getLinkTlp();
        $data_email['email'] = $this->Sosmed_model->getLinkEmail();

        $da = array_merge($data_ig, $data_fb, $data_tlp, $data_email);

        $this->load->view('header',$da);
        $this->load->view('kosan',$data);
        $this->load->view('footer');
    }

    public function detail($id_kosan) {
        $this->load->model('Kosan_model');

        $data['kosan'] = $this->Kosan_model->getKosanById($id_kosan);
        $data['kamars'] = $this->Kosan_model->getKamarsByKosanId($id_kosan);

        $data_ig['ig'] = $this->Sosmed_model->getLinkIg();
        $data_fb['fb'] = $this->Sosmed_model->getLinkFb();
        $data_tlp['tlp'] = $this->Sosmed_model->getLinkTlp();
        $data_email['email'] = $this->Sosmed_model->getLinkEmail();

        $da = array_merge($data_ig, $data_fb, $data_tlp, $data_email);

        $this->load->view('header',$da);
        $this->load->view('detail',$data);
        $this->load->view('footer');
    }
    
    public function detail_kamar($id_kosan) {
        $this->load->model('Kosan_model');
        $this->load->model('Penghuni_model');
        $data['kosan'] = $this->Kosan_model->getKosanById($id_kosan);
        $data['kamars'] = $this->Kosan_model->getKamarsById($id_kosan);
        $data['nama'] = $this->session->userdata('nama');
        $data['nomor'] = $this->session->userdata('nomor');
        $data['id_user'] = $this->session->userdata('user_id');
        $data['penghuni'] = $this->Penghuni_model->getPenghuniByUser($data['id_user']);
        
        // var_dump($this->session->userdata('user_id'));

        $data_ig['ig'] = $this->Sosmed_model->getLinkIg();
        $data_fb['fb'] = $this->Sosmed_model->getLinkFb();
        $data_tlp['tlp'] = $this->Sosmed_model->getLinkTlp();
        $data_email['email'] = $this->Sosmed_model->getLinkEmail();

        $da = array_merge($data_ig, $data_fb, $data_tlp, $data_email);

        $this->load->view('header',$da);
        $this->load->view('detail_kamar',$data);
        $this->load->view('footer');
    }

    public function search() {
        $cari = $this->input->post('search');
    
        $this->load->model('Kosan_model');
        $data['results'] = $this->Kosan_model->searchKosan($cari);
        $data['cari'] = $cari;

        $data_ig['ig'] = $this->Sosmed_model->getLinkIg();
        $data_fb['fb'] = $this->Sosmed_model->getLinkFb();
        $data_tlp['tlp'] = $this->Sosmed_model->getLinkTlp();
        $data_email['email'] = $this->Sosmed_model->getLinkEmail();

        $da = array_merge($data_ig, $data_fb, $data_tlp, $data_email);
    
        $this->load->view('header',$da);
        $this->load->view('cari', $data); 
        $this->load->view('footer');
    }

    public function about(){

        $data_ig['ig'] = $this->Sosmed_model->getLinkIg();
        $data_fb['fb'] = $this->Sosmed_model->getLinkFb();
        $data_tlp['tlp'] = $this->Sosmed_model->getLinkTlp();
        $data_email['email'] = $this->Sosmed_model->getLinkEmail();

        $da = array_merge($data_ig, $data_fb, $data_tlp, $data_email);

        $this->load->view('header',$da);
        $this->load->view('about'); 
        $this->load->view('footer');
    }
    
}
