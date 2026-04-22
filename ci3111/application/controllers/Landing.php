<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends MY_Controller
{
    public function index()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'home';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'home'
            );
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('landing');
        $this->load->view('template/footer');
    }
}
