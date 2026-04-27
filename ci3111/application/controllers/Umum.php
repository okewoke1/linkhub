<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tautan_model');
        $this->load->model('Folder_Skp_model');
    }

    public function administrasi()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'umum';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'umum'
            );
        }

        $data['title'] = 'Tautan Administrasi';
        $data['desc'] = 'Ini tautan administrasi.';
        $data['tautan'] = $this->Tautan_model->get_tautan_administrasi();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('tautan', $data);
        $this->load->view('template/footer');
    }

    public function umum()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'umum';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'umum'
            );
        }

        $data['title'] = 'Tautan Umum';
        $data['desc'] = 'Ini tautan umum.';
        $data['tautan'] = $this->Tautan_model->get_tautan_umum();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('tautan', $data);
        $this->load->view('template/footer');
    }

    public function bukti_dukung_skp()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'umum';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'umum'
            );
            
            $user_id = $this->session->userdata('id');
        }

        $data['title'] = 'Bukti Dukung SKP';
        $data['desc'] = 'Link menuju folder bukti dukung SKP setiap pegawai.';
        $data['skp'] = $this->Folder_Skp_model->get_folder_and_user_and_tim($user_id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('skp', $data);
        $this->load->view('template/footer');
    }
    
    public function ckp_wfh()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'umum';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'umum'
            );

            $user_id = $this->session->userdata('id');
        }

        $data['title'] = 'CKP WFH';
        $data['ckp_wfh'] = $this->Folder_Skp_model->get_url_ckp_wfh($user_id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('ckp_wfh', $data);
        $this->load->view('template/footer');
    }
}
