<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotFound extends CI_Controller
{

    public function index()
    {
        // Atur header untuk 404
        $this->output->set_status_header('404');
        // Load view 404 kustom
        $this->load->view('custom_404');
        // echo "test not found";
    }
}
