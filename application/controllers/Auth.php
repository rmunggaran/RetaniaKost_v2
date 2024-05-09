<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('form_validation'); // Pastikan library form_validation dimuat
    }
    
    public function login() {
        if ($this->session->userdata('admin_logged_in') || $this->session->userdata('user_logged_in')) {
            redirect('/'); // Ganti 'admin/dashboard' dengan halaman yang sesuai
        }
    
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            $user = $this->User_model->login($username); // Mengambil data pengguna berdasarkan username
    
            if ($user) {
                if (password_verify($password, $user->password)) {
                    if ($user->tipe == 'user') {
                        $user_data = array(
                            'user_id' => $user->id_user,
                            'username' => $user->username,
                            'nama' => $user->nama,
                            'email' => $user->email,
                            'nomor' => $user->nomor,
                            'user_logged_in' => true
                        );
                    } else {
                        $user_data = array(
                            'user_id' => $user->id_user,
                            'username' => $user->username,
                            'nama' => $user->nama,
                            'nomor' => $user->nomor,
                            'admin_logged_in' => true
                        );
                    }
    
                    $this->session->set_userdata($user_data);
                    if ($user->tipe == 'admin') {
                        redirect('admin/dashboard');
                    }
                    redirect('user');
                } else {
                    $this->session->set_flashdata('login_failed', 'Login failed. Check your username and password.');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('login_failed', 'Login failed. Check your username and password.');
                redirect('auth/login');
            }
        }
    }
    

    
    public function req()
    {
        if ($this->session->userdata('admin_logged_in') || $this->session->userdata('user_logged_in')) {
            redirect('/'); // Ganti 'admin/dashboard' dengan halaman yang sesuai
        }
        if ($this->session->userdata('true')) {
            redirect('user');
        }

        $this->form_validation->set_rules('username', 'user', 'required', [
            'required' => 'Username Belum diisi!!'
        ]);
        $this->form_validation->set_rules('nama', 'lengkap', 'required', [
            'required' => 'Nama Belum diisi!!'
        ]);
        $this->form_validation->set_rules('nomor', 'no whatsapp', 'required|regex_match[/^[0-9\+\(\)\/-]+$/]', [
            'required' => 'Nomor Belum diisi!!',
            'regex_match' => 'Format nomor tidak valid!'
        ]);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email', [
            'required' => 'Alamat Email belum diisi.',
            'valid_email' => 'Format Alamat Email tidak valid.'
        ]);    
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password belum diisi.',
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/req');
        } else {
            $nomor = $this->input->post('nomor', true);

            // Kirim OTP dan simpan nomor telepon ke session
            $this->send_otp($nomor);
            $this->session->set_userdata('nomor', $nomor);

            // Simpan username dan nama ke session
            $this->session->set_userdata('username', $this->input->post('username', true));
            $this->session->set_userdata('nama', $this->input->post('nama', true));
            $this->session->set_userdata('email', $this->input->post('email', true));
            $this->session->set_userdata('password', $this->input->post('password1', true));

            // Tampilkan halaman verifikasi OTP
            $this->load->view('otp');
        }
    }

    public function simpan_data()
    {
        $otp_user = $this->input->post('otp', true);
        $otp_session = $this->session->userdata('otp');
        $nomor = $this->session->userdata('nomor');
        $username = $this->session->userdata('username');
        $nama = $this->session->userdata('nama');
        $email = $this->session->userdata('email');
        $password = $this->session->userdata('password');

        // Verifikasi OTP
        $verification_result = $this->verify_otp($otp_user, $nomor);

        if ($verification_result['status'] == 'success') {

            if ($this->User_model->cekNomor($nomor)) {
                // Jika nomor sudah ada, berikan pesan kesalahan
                $this->session->set_flashdata('pesan', 'Nomor telepon sudah digunakan. Silakan gunakan nomor telepon lain.');
                redirect('admin/req');
            }

            // Jika verifikasi sukses, simpan data pengguna ke dalam database
            $data = [
                'username' => htmlspecialchars($username),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'tipe' => 'user',
                'nama' => htmlspecialchars($nama),
                'email' => htmlspecialchars($email),
                'nomor' => htmlspecialchars($nomor)
            ];

            $this->User_model->simpanData($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('auth/login');
        } else {
            // Jika verifikasi gagal, tampilkan pesan kesalahan
            $this->session->set_flashdata('pesan', $verification_result['message']);
            redirect('admin/req');
        }
    }



    private function send_otp($nomor)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Hapus OTP sebelumnya jika ada
        $this->db->where('nomor', $nomor);
        $this->db->delete('otp');

        $otp = rand(100000, 999999);
        $waktu = time();

        $data = [
            'nomor' => $nomor,
            'otp' => $otp,
            'waktu' => $waktu
        ];

        // Simpan OTP ke database
        $this->db->insert('otp', $data);

        // Kirim OTP melalui API
        $curl = curl_init();
        $message = "Kode verifikasi Anda: " . $otp . ". \nMohon untuk tidak memberikan kode ini kepada siapapun.";
        $api_data = [
            'target' => $nomor,
            'message' => $message
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: X@#p4rndUqDVDHMoL3#P",
        ));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($api_data));
        curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
    }

    private function verify_otp($otp, $nomor)
    {
        $this->db->where('nomor', $nomor);
        $this->db->where('otp', $otp);
        $query = $this->db->get('otp');

        if ($query->num_rows() > 0) {
            $otp_data = $query->row_array();
            if (time() - $otp_data['waktu'] <= 300) {
                return ['status' => 'success'];
            } else {
                return ['status' => 'error', 'message' => 'OTP sudah kedaluwarsa'];
            }
        } else {
            return ['status' => 'error', 'message' => 'OTP salah'];
        }
    }

    public function logout() {
        $this->session->sess_destroy(); // Hapus semua data sesi
        redirect('/');
    }

    public function editProfile($id_user) {
        // Pastikan pengguna telah login
        if (!$this->session->userdata('user_logged_in')) {
            redirect('admin/login');
        }
    
        // Ambil data pengguna dari sesi
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->getUserById($user_id);
    
        // Lakukan validasi form
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('nomor', 'Nomor Telepon', 'trim|required|numeric');
        $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|matches[password1]');
    
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan halaman edit profile dengan pesan error
            $this->load->view('admin/edit_profile', $data);
        } else {
            // Jika validasi berhasil, dapatkan data dari form
            $username = $this->input->post('username', true);
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $nomor = $this->input->post('nomor', true);
            $password = $this->input->post('password', true);
    
            // Ambil nomor telepon dari database untuk memeriksa perubahan nomor
            $old_nomor = $data['user']['nomor'];
    
            // Simpan data baru ke dalam database
            $update_data = array(
                'username' => $username,
                'nama' => $nama,
                'email' => $email,
                'nomor' => $nomor
            );
    
            // Jika password diisi, update password
            if (!empty($password)) {
                $update_data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }
            
            // Jika nomor telepon berubah, kirim OTP ke nomor yang baru
            if ($nomor != $old_nomor) {
                $this->send_otp($nomor);
                $data['update_data'] = $update_data;
                $data['id_user'] = $id_user;
                $this->load->view('otp',$data);
            }else{
                $this->User_model->updateUser($user_id, $update_data);
    
                // Set pesan sukses dan redirect ke halaman profile
                $this->session->set_flashdata('success_message', 'Profile berhasil diperbarui.');
                redirect('user');
            }

            
        }
    }
    
    public function simpanNomor($id){
        if (!$this->session->userdata('user_logged_in')) {
            redirect('admin/login');
        }
    
        // Ambil data pengguna dari sesi
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->getUserById($user_id);
    
        // Lakukan validasi form
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('nomor', 'Nomor Telepon', 'trim|required|numeric');
        $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|matches[password1]');
    
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan halaman edit profile dengan pesan error
            redirect('user');
        } else {
            $otp_user = $this->input->post('otp', true);
            $username = $this->input->post('username', true);
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $nomor = $this->input->post('nomor', true);
            $password = $this->input->post('password', true);

            $verification_result = $this->verify_otp($otp_user, $nomor);

            if ($verification_result['status'] == 'success') {
    
            // Simpan data baru ke dalam database
            $update_data = array(
                'username' => $username,
                'nama' => $nama,
                'email' => $email,
                'nomor' => $nomor
            );
    
            // Jika password diisi, update password
            if (!empty($password)) {
                $update_data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->User_model->updateUser($user_id, $update_data);

            // Set pesan sukses dan redirect ke halaman profile
            $this->session->set_flashdata('success_message', 'Profile berhasil diperbarui.');
            redirect('user');
            } else {
                // Jika verifikasi gagal, tampilkan pesan kesalahan
                $this->session->set_flashdata('pesan', $verification_result['message']);
                redirect('admin/req');
            }

            
        }
    }
    
}
