<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penghuni extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Penghuni_model');
        $this->load->model('Tagihan_model');
    }

	public function index()
	{
		if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
        $data['penghuni'] = $this->Penghuni_model->getRecentPenghuni();

        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/penghuni/penghuni',$data);
        $this->load->view('admin/layout/footer.php');
	}

    public function search() {
        $cari = $this->input->get('cari');
    
        $this->load->model('Kosan_model');
        $data['results'] = $this->Penghuni_model->searcPenghuni($cari);
        $data['cari'] = $cari;
    
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/penghuni/penghuni',$data);
        $this->load->view('admin/layout/footer.php');
    }

	public function tambahPenghuni()
	{
		if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $data['kosan'] = $this->Penghuni_model->getRecentKosan();

        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/penghuni/add_penghuni',$data);
        $this->load->view('admin/layout/footer.php');
	}

    public function addPenghuni(){

        // Konfigurasi pengunggahan gambar
        $config['upload_path'] = FCPATH . 'public/admin/img/ktp/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
    
        $this->load->library('upload', $config);
    
        $foto_ktp = '';
    
        if ($this->upload->do_upload('foto_ktp')) {
            $upload_data = $this->upload->data();
            $foto_ktp = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        // Lanjutkan dengan proses penyimpanan ke database
        $id_user = $this->input->post('id_user');
        $id_kamar = $this->input->post('id_kamar');
        $ktp = $this->input->post('ktp');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $kosan = $this->input->post('kosan');
        $nomor = $this->input->post('nomor');
        $hp = $this->input->post('hp');
        $bayaran = $this->input->post('bayaran');
        $tarif_perbulan = $this->input->post('tarif_perbulan');
        $tarif_pertahun = $this->input->post('tarif_pertahun');
        $status = 'ya';
    
        $penghuni_data = array(
            'id_user' => $id_user,
            'id_kamar' => $id_kamar,
            'nik' => $ktp,
            'ktp' => $foto_ktp,
            'nama' => $nama,
            'jk' => $jk,
            'tlp' => $hp,
            'kosan' => $kosan,
            'nomor_kosan' => $nomor,
            'bayaran' => $bayaran,
            'tarif_perbulan' => $tarif_perbulan,
            'tarif_pertahun' => $tarif_pertahun,
            'status' => $status,
        );

        // var_dump($penghuni_data);
        if ($this->Penghuni_model->cekPenghuni($id_user)) {
            $id_p = $this->Penghuni_model->getPenghuniByUser($id_user);

            echo "<script>
                     var result = confirm('Apakah anda yakin ingin pindah ke sini?');
                     if (result) {
                        window.location.href = '" . base_url('/') . "';
                     }
                  </script>";
        
            $updated = $this->Penghuni_model->updateByIduser($id_user, $penghuni_data);
        
            if ($updated) {
                $this->session->set_flashdata('success', 'Berhasil mengupdate kamar Baru');
                redirect('Invoice/BuatInvoice/' . $id_p['id_penghuni']);
            } else {
                $this->session->set_flashdata('error', 'Gagal Memperbarui status');
            }
        }
        
    
        $inserted = $this->Penghuni_model->addPenghuni($penghuni_data);
    
        if ($inserted) {
            $id_penghuni = $this->db->insert_id();
            if ($this->session->userdata('admin_logged_in')) {
                $this->session->set_flashdata('success', 'Berhasil Menambahkan penghuni Baru');
                redirect('penghuni/index');
            } else {
                $this->session->set_flashdata('success', 'Silahkan melakukan pembayaran terima kasih *U*');
                redirect('Invoice/BuatInvoice/' . $id_penghuni);
            }
        } else {
            $this->session->set_flashdata('error', 'Gagal Menambahkan penghuni Baru');
            $this->tambahkost();
        }
    }

    public function editPenghuni($id){
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        $datapenghuni['penghuni'] = $this->Penghuni_model->getPenghuniById($id);
        $data['kosan'] = $this->Penghuni_model->getRecentKosan();
    
        if (!$datapenghuni['penghuni']) {
            show_404();
        }
    
        // Menggabungkan kedua array data menjadi satu
        $merged_data = array_merge($datapenghuni, $data);
    
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        // Mengirimkan satu array data ke view
        $this->load->view('admin/penghuni/edit_penghuni.php', $merged_data);
        $this->load->view('admin/layout/footer.php');
    }
    

    public function updatePenghuni($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kamar = $this->Penghuni_model->getPenghuniById($id);
    
            // Lanjutkan dengan proses penyimpanan ke database
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $jk = $this->input->post('jk');
            $kosan = $this->input->post('kosan');
            $nomor = $this->input->post('nomor');
            $hp = $this->input->post('hp');
            $status = $this->input->post('status');
    
            $penghuni_data = array(
                'nik' => $nik,
                'nama' => $nama,
                'jk' => $jk,
                'tlp' => $hp,
                'kosan' => $kosan,
                'nomor_kosan' => $nomor,
                'status' => $status,
            );
    
    
            // var_dump($id);
            $updated = $this->Penghuni_model->updatePenghuni($id, $penghuni_data);
    
            if ($updated) {
                $this->session->set_flashdata('success', 'Berhasil Memperbarui Data Kosan');
                redirect('penghuni/index');
            } else {
                $this->session->set_flashdata('error', 'Gagal Memperbarui Data Kosan');
            }
        }
        $this->editKosan($id);
    }

    public function deletePenghuni($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $kamar = $this->Penghuni_model->getPenghuniById($id);

        if ($kamar) {
            $this->hapusFotokamar($kamar['ktp']);
            
            // $id_penghuni = $this->Tagihan_model->getInvoiceByIdPenghuni($id);

            // $deletedT = $this->Tagihan_model->deleteTransaksi($id_penghuni);
            $deletedP = $this->Penghuni_model->deletePenghuni($id);
            
            if ($deletedP) {
                $this->session->set_flashdata('success', 'penghuni berhasil dihapus beserta foto-fotonya.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus foto.');
            }

            redirect('penghuni/index');
        } else {
            $this->session->set_flashdata('error', 'penghuni tidak ditemukan.');
            redirect('penghuni/index');
        }
    }

    private function hapusFotokamar($nama_foto) {
        $lokasi_foto = FCPATH . 'public/admin/img/ktp/' . $nama_foto;
    
        if (file_exists($lokasi_foto)) {
            unlink($lokasi_foto); // Menghapus berkas foto
            echo 'Berkas ' . $nama_foto . ' telah dihapus.';
        } else {
            echo 'Berkas ' . $nama_foto . ' tidak ditemukan.';
        }
    }

    public function berhentiKost($id_penghuni){

        $penghuni_data = array(
            'id_kamar' => 0,
            'status' => 'tidak',
        );

        $updated = $this->Penghuni_model->updatePenghuni($id_penghuni, $penghuni_data);
    
            if ($updated) {
                $this->session->set_flashdata('success', 'Sampai jumpa lagi terima kasih');
                redirect('penghuni/index');
            } else {
                $this->session->set_flashdata('error', 'Gagal Memperbarui status');
            }
    }

    public function pindah($id_user){

    }
}
