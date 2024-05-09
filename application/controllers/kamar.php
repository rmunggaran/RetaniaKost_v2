<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Kamar_model');
    }

	public function index($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $data['id'] = $id;
        $data['kamar'] = $this->Kamar_model->getKamarByKosan($id);
    
        // Tampilkan halaman dashboard admin
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/kamar/kamar.php',$data);
        $this->load->view('admin/layout/footer.php');
	}

    public function tambahKamar($id){
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->model('Kosan_model');
        $data['kosan'] = $this->Kosan_model->getKosanById($id);
    
        if (!$data['kosan']) {
            show_404(); // Tampilkan halaman 404 jika ID tidak ditemukan
        }
    
        // Tampilkan halaman dashboard admin
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/kamar/add_kamar.php',$data);
        $this->load->view('admin/layout/footer.php');
    }

    public function addKamar() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        // Konfigurasi pengunggahan gambar
        $config['upload_path'] = FCPATH . 'public/admin/img/db_images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
    
        $this->load->library('upload', $config);
    
        $foto_option1 = '';
        $foto_option2 = '';
        $foto_option3 = '';
        $foto_option4 = '';
        $foto_option5 = '';
    
        if ($this->upload->do_upload('foto_option1')) {
            $upload_data = $this->upload->data();
            $foto_option1 = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        if ($this->upload->do_upload('foto_option2')) {
            $upload_data = $this->upload->data();
            $foto_option2 = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        if ($this->upload->do_upload('foto_option3')) {
            $upload_data = $this->upload->data();
            $foto_option3 = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        if ($this->upload->do_upload('foto_option4')) {
            $upload_data = $this->upload->data();
            $foto_option4 = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        if ($this->upload->do_upload('foto_option5')) {
            $upload_data = $this->upload->data();
            $foto_option5 = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        // Lanjutkan dengan proses penyimpanan ke database
        $id = $this->input->post('id');
        $nama_kosan = $this->input->post('namakosan');
        $namakamar = $this->input->post('namakamar');
        $tarif_bulan = $this->input->post('tarif_bulan');
        $tarif_tahun = $this->input->post('tarif_tahun');
        $fasilitas = $this->input->post('fasilitas');

        $nilai_tanpa_rp_bl = str_replace(['Rp', '.', ','], '', $tarif_bulan);
        $nilai_tanpa_rp_th = str_replace(['Rp', '.', ','], '', $tarif_tahun);
    
        $this->load->model('Kamar_model');
        $kamar_data = array(
            'id_kosan' => $id,
            'nama_kosan' => $nama_kosan,
            'nama_kamar' => $namakamar,
            'tarif_perbulan' => $nilai_tanpa_rp_bl,
            'tarif_pertahun' => $nilai_tanpa_rp_th,
            'foto_option1' => $foto_option1,
            'foto_option2' => $foto_option2,
            'foto_option3' => $foto_option3,
            'foto_option4' => $foto_option4,
            'foto_option5' => $foto_option5,
            'fasilitas' => implode(',', $fasilitas) 
        );
    
        $inserted = $this->Kamar_model->addKamar($kamar_data);
    
        if ($inserted) {
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Kamar Baru');
            redirect('admin/kosan'); 
        } else {
            $this->session->set_flashdata('error', 'Gagal Menambahkan Kamar Baru');
            $this->tambahkost();
        }
    }

    public function editKamar($id){
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
   
        $this->load->model('Kamar_model');
        $datakamar['kamar'] = $this->Kamar_model->getKamarById($id);
    
        if (!$datakamar['kamar']) {
            show_404(); 
        }
    
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/kamar/edit_kamar.php', $datakamar);
        $this->load->view('admin/layout/footer.php');
    }

    public function updateKamar($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->load->model('Kamar_model');
            $kamar = $this->Kamar_model->getKamarById($id);
    
            $old_foto_option1 = $kamar['foto_option1'];
            $old_foto_option2 = $kamar['foto_option2'];
            $old_foto_option3 = $kamar['foto_option3'];
            $old_foto_option4 = $kamar['foto_option4'];
            $old_foto_option5 = $kamar['foto_option5'];
    
            $config['upload_path'] = FCPATH . 'public/admin/img/db_images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
    
            $this->load->library('upload', $config);
    
            $nama_kosan = $this->input->post('namakosan');
            $namakamar = $this->input->post('namakamar');
            $tarif_bulan = $this->input->post('tarif_bulan');
            $tarif_tahun = $this->input->post('tarif_tahun');
            $fasilitas = $this->input->post('fasilitas');

            $nilai_tanpa_rp_bl = str_replace(['Rp', '.', ','], '', $tarif_bulan);
            $nilai_tanpa_rp_th = str_replace(['Rp', '.', ','], '', $tarif_tahun);
    
            $kamar_data = array(
                'nama_kosan' => $nama_kosan,
                'nama_kamar' => $namakamar,
                'tarif_perbulan' => $nilai_tanpa_rp_bl,
                'tarif_pertahun' => $nilai_tanpa_rp_th,
                'fasilitas' => implode(',', $fasilitas)
            );
    
            // Periksa setiap foto dan simpan ke dalam data
            if ($this->upload->do_upload('foto_option1')) {
                $upload_data = $this->upload->data();
                $kamar_data['foto_option1'] = $upload_data['file_name'];
    
                if (!empty($old_foto_option1)) {
                    $foto_option1_path = FCPATH . 'public/admin/img/db_images/' . $old_foto_option1;
                    if (file_exists($foto_option1_path)) {
                        unlink($foto_option1_path);
                    }
                }
            } else {
                $kamar_data['foto_option1'] = $old_foto_option1;
            }
    
            if ($this->upload->do_upload('foto_option2')) {
                $upload_data = $this->upload->data();
                $kamar_data['foto_option2'] = $upload_data['file_name'];
    
                if (!empty($old_foto_option2)) {
                    $foto_option2_path = FCPATH . 'public/admin/img/db_images/' . $old_foto_option2;
                    if (file_exists($foto_option2_path)) {
                        unlink($foto_option2_path);
                    }
                }
            } else {
                $kamar_data['foto_option2'] = $old_foto_option2;
            }
    
            if ($this->upload->do_upload('foto_option3')) {
                $upload_data = $this->upload->data();
                $kamar_data['foto_option3'] = $upload_data['file_name'];
    
                if (!empty($old_foto_option3)) {
                    $foto_option3_path = FCPATH . 'public/admin/img/db_images/' . $old_foto_option3;
                    if (file_exists($foto_option3_path)) {
                        unlink($foto_option3_path);
                    }
                }
            } else {
                $kamar_data['foto_option3'] = $old_foto_option3;
            }
    
            if ($this->upload->do_upload('foto_option4')) {
                $upload_data = $this->upload->data();
                $kamar_data['foto_option4'] = $upload_data['file_name'];
    
                if (!empty($old_foto_option4)) {
                    $foto_option4_path = FCPATH . 'public/admin/img/db_images/' . $old_foto_option4;
                    if (file_exists($foto_option4_path)) {
                        unlink($foto_option4_path);
                    }
                }
            } else {
                $kamar_data['foto_option4'] = $old_foto_option4;
            }
    
            if ($this->upload->do_upload('foto_option5')) {
                $upload_data = $this->upload->data();
                $kamar_data['foto_option5'] = $upload_data['file_name'];
    
                if (!empty($old_foto_option5)) {
                    $foto_option5_path = FCPATH . 'public/admin/img/db_images/' . $old_foto_option5;
                    if (file_exists($foto_option5_path)) {
                        unlink($foto_option5_path);
                    }
                }
            } else {
                $kamar_data['foto_option5'] = $old_foto_option5;
            }
    
            // var_dump($id);
            $updated = $this->Kamar_model->updateKamar($id, $kamar_data);
    
            if ($updated) {
                $this->session->set_flashdata('success', 'Berhasil Memperbarui Data Kosan');
                redirect('admin/kosan');
            } else {
                $this->session->set_flashdata('error', 'Gagal Memperbarui Data Kosan');
            }
        }
        $this->editKosan($id);
    }
    

    public function deleteKamar($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        $this->load->model('Kamar_model');
        $kamar = $this->Kamar_model->getKamarById($id);
    
        if ($kamar) {
            // Hapus foto-foto terlebih dahulu
            $this->hapusFotoKamar($kamar['foto_option1']);
            $this->hapusFotoKamar($kamar['foto_option2']);
            $this->hapusFotoKamar($kamar['foto_option3']);
            $this->hapusFotoKamar($kamar['foto_option4']);
            $this->hapusFotoKamar($kamar['foto_option5']);
    
            // Hapus data kamar dari database
            $deleted = $this->Kamar_model->deleteKamar($id);
    
            if ($deleted) {
                $this->session->set_flashdata('success', 'Kamar berhasil dihapus beserta foto-fotonya.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus kamar.');
            }
    
            redirect('admin/kosan');
        } else {
            $this->session->set_flashdata('error', 'Kamar tidak ditemukan.');
            redirect('admin/kosan');
        }
    }

    private function hapusFotoKamar($nama_foto) {
        $lokasi_foto = FCPATH . 'public/admin/img/db_images/' . $nama_foto;
    
        if (file_exists($lokasi_foto)) {
            unlink($lokasi_foto); // Menghapus berkas foto
            echo 'Berkas ' . $nama_foto . ' telah dihapus.';
        } else {
            echo 'Berkas ' . $nama_foto . ' tidak ditemukan.';
        }
    }


    public function searchKamar()
    {
        $nama_kosan = $this->input->post('nama_kosan');

        // Lakukan query berdasarkan nama kosan
        $result = $this->db->query("SELECT * FROM kamar WHERE nama_kosan = ?", array($nama_kosan))->result_array();

        // Kirim hasil sebagai respons JSON
        echo json_encode($result);
    }
    
}
