<?php
class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function login() {
        // Cek apakah admin sudah login, jika ya, arahkan ke halaman admin
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard'); // Ganti 'dashboard' dengan halaman admin yang sesuai
        }

        // Tampilkan halaman login admin
        redirect('/');
    }

    public function req() {
        // Cek apakah admin sudah login, jika ya, arahkan ke halaman admin
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard'); // Ganti 'dashboard' dengan halaman admin yang sesuai
        }

        // Tampilkan halaman login admin
        $this->load->view('admin/req');
    }

    public function dashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('/');
        }

        $this->load->model('Kosan_model');
        $jumlahkosan['jumlah_kosan'] = $this->Kosan_model->getJumlahKosan();
        $this->load->model('Penghuni_model');
        $jumlahpenghuni['jumlah_penghuni'] = $this->Kosan_model->getJumlahPenghuni();

        $merged_data = array_merge($jumlahkosan, $jumlahpenghuni);
    
        // Tampilkan halaman dashboard admin
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/dashboard',$merged_data);
        $this->load->view('admin/layout/footer.php');
    }    

    public function kosan() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('/');
        }
        $this->load->model('Kosan_model');
        $data['kosan'] = $this->Kosan_model->getRecentKosan();
    
        // Tampilkan halaman dashboard admin
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/room/room.php',$data);
        $this->load->view('admin/layout/footer.php');
    }    
    
    public function tambahkost() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('/');
        }
    
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/room/add_room.php');
        $this->load->view('admin/layout/footer.php');
    }

    public function addkost() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('/');
        }
    
        // Konfigurasi pengunggahan gambar
        $config['upload_path'] = FCPATH . 'public/admin/img/db_images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
    
        $this->load->library('upload', $config);
    
        $foto_utama = '';
        $foto_kamar = '';
        $foto_toilet = '';
    
        if ($this->upload->do_upload('foto_utama')) {
            $upload_data = $this->upload->data();
            $foto_utama = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        if ($this->upload->do_upload('foto_kamar')) {
            $upload_data = $this->upload->data();
            $foto_kamar = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        if ($this->upload->do_upload('foto_toilet')) {
            $upload_data = $this->upload->data();
            $foto_toilet = $upload_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            // Handle kesalahan pengunggahan jika diperlukan
        }
    
        // Lanjutkan dengan proses penyimpanan ke database
        $nama_kosan = $this->input->post('namakosan');
        $wilayah = $this->input->post('wilayah');
        $layanan = $this->input->post('layanan');
        $tlp = $this->input->post('notlp');
        $latlong = $this->input->post('latlong');
        $alamat = $this->input->post('alamat');
        $deskrisi = $this->input->post('deskrisi');
    
        $this->load->model('Kosan_model');
        $kosan_data = array(
            'nama_kosan' => $nama_kosan,
            'wilayah' => $wilayah,
            'layanan' => $layanan,
            'foto_utama' => $foto_utama,
            'foto_kamar' => $foto_kamar,
            'foto_toilet' => $foto_toilet,
            'tlp' => $tlp,
            'map' => $latlong,
            'deskripsi' => $deskrisi,
            'alamat' => $alamat
        );
    
        $inserted = $this->Kosan_model->tambahKosan($kosan_data);
    
        if ($inserted) {
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Kosan Baru');
            redirect('admin/kosan'); // Redirect ke halaman kosan setelah menambahkan kosan
        } else {
            $this->session->set_flashdata('error', 'Gagal Menambahkan Kosan Baru');
            $this->tambahkost();
        }
    }
    
    public function hapuskosan($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('/');
        }
    
        $this->load->model('Kosan_model');
        $kosan = $this->Kosan_model->getKosanById($id);
    
        if ($kosan) {
            // Hapus foto-foto terlebih dahulu
            $this->hapusFotoKosan($kosan['foto_utama']);
            $this->hapusFotoKosan($kosan['foto_kamar']);
            $this->hapusFotoKosan($kosan['foto_toilet']);
    
            // Hapus data kosan dari database
            $deleted = $this->Kosan_model->hapusKosan($id);
            
            if ($deleted) {
                $this->session->set_flashdata('success', 'Kosan berhasil dihapus beserta foto-fotonya.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus foto.');
            }

            redirect('admin/kosan');
        } else {
            echo '<div class="alert alert-danger" role="alert">Kosan tidak ditemukan.</div>';
        }
    }
    
    private function hapusFotoKosan($nama_foto) {
        $lokasi_foto = FCPATH . 'public/admin/img/db_images/' . $nama_foto;
    
        if (file_exists($lokasi_foto)) {
            unlink($lokasi_foto); // Menghapus berkas foto
            echo 'Berkas ' . $nama_foto . ' telah dihapus.';
        } else {
            echo 'Berkas ' . $nama_foto . ' tidak ditemukan.';
        }
    }
    
    public function editKosan($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('/');
        }
    
        // Ambil data kosan berdasarkan ID
        $this->load->model('Kosan_model');
        $data['kosan'] = $this->Kosan_model->getKosanById($id);
    
        if (!$data['kosan']) {
            show_404(); // Tampilkan halaman 404 jika ID tidak ditemukan
        }
    
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/room/edit_room.php', $data);
        $this->load->view('admin/layout/footer.php');
    }
    
    public function updateKosan($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('/');
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->load->model('Kosan_model');
            $kosan = $this->Kosan_model->getKosanByIdupdate($id);
    
            $old_foto_utama = $kosan['foto_utama'];
            $old_foto_kamar = $kosan['foto_kamar'];
            $old_foto_toilet = $kosan['foto_toilet'];
    
            // Konfigurasi pengunggahan foto
            $config['upload_path'] = FCPATH . 'public/admin/img/db_images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
    
            $this->load->library('upload', $config);
    
            // Ambil data dari formulir
            $nama_kosan = $this->input->post('namakosan');
            $wilayah = $this->input->post('wilayah');
            $layanan = $this->input->post('layanan');
            $tlp = $this->input->post('notlp');
            $latlong = $this->input->post('latlong');
            $alamat = $this->input->post('alamat');
            $deskripsi = $this->input->post('deskripsi');
    
            // Lakukan validasi dan penyimpanan data yang diperbarui
            $update_data = array(
                'nama_kosan' => $nama_kosan,
                'wilayah' => $wilayah,
                'layanan' => $layanan,
                'tlp' => $tlp,
                'map' => $latlong,
                'alamat' => $alamat,
                'deskripsi' => $deskripsi
            );

            // var_dump($update_data);
    
            // Periksa apakah ada pengunggahan baru untuk foto utama
            if ($this->upload->do_upload('foto_utama')) {
                $upload_data = $this->upload->data();
                $update_data['foto_utama'] = $upload_data['file_name'];
    
                // Hapus foto utama lama jika ada
                if (!empty($old_foto_utama)) {
                    $foto_utama_path = FCPATH . 'public/admin/img/db_images/' . $old_foto_utama;
                    if (file_exists($foto_utama_path)) {
                        unlink($foto_utama_path);
                    }
                }
            } else {
                // Gunakan foto utama lama jika tidak ada pengunggahan baru
                $update_data['foto_utama'] = $old_foto_utama;
            }
    
            // Periksa apakah ada pengunggahan baru untuk foto kamar
            if ($this->upload->do_upload('foto_kamar')) {
                $upload_data = $this->upload->data();
                $update_data['foto_kamar'] = $upload_data['file_name'];
    
                // Hapus foto kamar lama jika ada
                if (!empty($old_foto_kamar)) {
                    $foto_kamar_path = FCPATH . 'public/admin/img/db_images/' . $old_foto_kamar;
                    if (file_exists($foto_kamar_path)) {
                        unlink($foto_kamar_path);
                    }
                }
            } else {
                // Gunakan foto kamar lama jika tidak ada pengunggahan baru
                $update_data['foto_kamar'] = $old_foto_kamar;
            }
    
            // Periksa apakah ada pengunggahan baru untuk foto toilet
            if ($this->upload->do_upload('foto_toilet')) {
                $upload_data = $this->upload->data();
                $update_data['foto_toilet'] = $upload_data['file_name'];
    
                // Hapus foto toilet lama jika ada
                if (!empty($old_foto_toilet)) {
                    $foto_toilet_path = FCPATH . 'public/admin/img/db_images/' . $old_foto_toilet;
                    if (file_exists($foto_toilet_path)) {
                        unlink($foto_toilet_path);
                    }
                }
            } else {
                // Gunakan foto toilet lama jika tidak ada pengunggahan baru
                $update_data['foto_toilet'] = $old_foto_toilet;
            }
    
            $updated = $this->Kosan_model->updateKosan($id, $update_data);
    
            if ($updated) {
                $this->session->set_flashdata('success', 'Berhasil Memperbarui Data Kosan');
                redirect('admin/kosan');
            } else {
                $this->session->set_flashdata('error', 'Gagal Memperbarui Data Kosan');
            }
        }
        $this->editKosan($id);
    }
    
    public function dataTransaksi() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('/');
        }
        $this->load->model('Penghuni_model');
        $this->load->model('Tagihan_model');

        $data['tagihan'] = $this->Tagihan_model->getAllInvoices();
        $data['penghuni'] = $this->Penghuni_model->getRecentPenghuni();
    
        // Tampilkan halaman dashboard admin
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/transaksi/transaksi',$data);
        $this->load->view('admin/layout/footer.php');
    }    
    
    public function searchTransaksi() {
        $cari = $this->input->get('cari');
    
        $this->load->model('Tagihan_model');
        $data['results'] = $this->Tagihan_model->cariTransaksi($cari);
        $data['cari'] = $cari;
    
        $this->load->view('admin/layout/navbar.php');
        $this->load->view('admin/layout/sidebar.php');
        $this->load->view('admin/transaksi/transaksi',$data);
        $this->load->view('admin/layout/footer.php');
    }

    public function deleteTransaksi($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->model('Tagihan_model');

        $id_penghuni = $this->Tagihan_model->getInvoiceByIdPenghuni($id);

        if ($id_penghuni) {

            $deleted = $this->Tagihan_model->deleteTransaksi($id_penghuni);
            
            if ($deleted) {
                $this->session->set_flashdata('success', 'transaksi berhasil di hapus.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus foto.');
            }

            redirect('admin/dataTransaksi');
        } else {
            $this->session->set_flashdata('error', 'penghuni tidak ditemukan.');
            redirect('admin/dataTransaksi');
        }
    }
    
    public function laporanTransaksi_pdf()
	{
		$this->load->library('Dompdf_gen');
        $this->load->model('Tagihan_model');

		$data['transaksi'] = $this->Tagihan_model->getAllInvoices();

		$this->load->view('admin/transaksi/laporan/laporanTransaksiPDF', $data);

		$paper = 'A4';
		$orien = 'landscape';
		$html = $this->output->get_output();
		
		$this->dompdf->set_paper($paper, $orien);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporanTransaksi.pdf');
	}
    
    public function export_excel()
	{
        $this->load->model('Tagihan_model');
		$data = array(
			'title' => 'laporanTransaksi',
			'transaksi' => $this->Tagihan_model->getAllInvoices()
		);
		
		$this->load->view('admin/transaksi/laporan/laporanTransaksiExcel', $data);
	}

    public function logout() {
        $this->session->unset_userdata('admin_logged_in'); // Ganti 'admin_logged_in' sesuai dengan session key yang digunakan untuk admin
        redirect('/'); // Redirect ke halaman login
    }
    
}

