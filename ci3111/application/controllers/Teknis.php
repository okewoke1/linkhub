<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknis extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tautan_model');
    }

    public function sosial()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'teknis';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'teknis'
            );
        }

        $data['title'] = 'Tautan Sosial';
        $data['desc'] = 'Link menuju sumber daya digital Tim Sosial.';
        $data['tautan'] = $this->Tautan_model->get_tautan_teknis(2);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('tautan', $data);
        $this->load->view('template/footer');
    }

    public function produksi()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'teknis';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'teknis'
            );
        }

        $data['title'] = 'Tautan Produksi';
        $data['desc'] = 'Link menuju sumber daya digital Tim Produksi.';
        $data['tautan'] = $this->Tautan_model->get_tautan_teknis(3);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('tautan', $data);
        $this->load->view('template/footer');
    }

    public function distribusi()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'teknis';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'teknis'
            );
        }

        $data['title'] = 'Tautan Distribusi';
        $data['desc'] = 'Link menuju sumber daya digital Tim Distribusi.';
        $data['tautan'] = $this->Tautan_model->get_tautan_teknis(4);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('tautan', $data);
        $this->load->view('template/footer');
    }

    public function neraca()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'teknis';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'teknis'
            );
        }

        $data['title'] = 'Tautan Neraca';
        $data['desc'] = 'Link menuju sumber daya digital Tim Neraca.';
        $data['tautan'] = $this->Tautan_model->get_tautan_teknis(5);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('tautan', $data);
        $this->load->view('template/footer');
    }

    public function ipds()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'teknis';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'teknis'
            );
        }

        $data['title'] = 'Tautan IPDS';
        $data['desc'] = 'Link menuju sumber daya digital Tim IPDS.';
        $data['tautan'] = $this->Tautan_model->get_tautan_teknis(6);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('tautan', $data);
        $this->load->view('template/footer');
    }
}
