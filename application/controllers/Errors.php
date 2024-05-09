<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function show_404() {
        $this->load->view('error_page');
    }

    // Tambahkan method lain untuk menangani jenis kesalahan lainnya sesuai kebutuhan
}
