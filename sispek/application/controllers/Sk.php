<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-danger">Anda belum login!</div>'
            );
            redirect('login');
        }
    }

    // ======================
    // LIST SK
    // ======================
    public function index()
    {
        $data['level']    = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        
        $data['sk']       = $this->M_sk->get_all();

        $this->load->view('template/header');
        $this->load->view(
            $data['level'] == 1 ? 'template/sidebar_adm' : 'template/sidebar',
            $data
        );
        $this->load->view('sk', $data);
        $this->load->view('template/footer');
    }

    // ======================
    // FORM INPUT SK
    // ======================
    public function create()
    {
        
    $data['level']    = $this->session->userdata('level');
    $username = $this->session->userdata('username');
    $data['username'] = $username;    
    $tahun    = $this->input->get('tahun') ?? date('Y');
    $kelompok = $this->input->get('kelompok_anggaran');

    $data['tahun']              = $tahun;
    $data['kelompok_anggaran']  = $kelompok;
    $data['tugas']              = $this->M_sk->get_master_tugas($tahun, $kelompok);
    
        $this->load->view('template/header');
        $this->load->view(
            $data['level'] == 1 ? 'template/sidebar_adm' : 'template/sidebar',
            $data
        );
        $this->load->view('form_sk', $data);
        $this->load->view('template/footer');
    }


    // ======================
    // SIMPAN SK (DRAFT)
    // ======================
    
    public function store()
    {
        $post = $this->input->post();

        $id_sk = $this->M_sk->insert([
            'no_sk'      => $post['no_sk'],
            'tanggal_sk' => $post['tanggal_sk'],
            'tentang'    => $post['tentang'],
            'status_sk'  => 'draft',
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('username')
        ]);

        // relasi tugas
        if (!empty($post['id_tugas'])) {
            foreach ($post['id_tugas'] as $id_tugas) {
                $this->M_sk->insert_tugas($id_sk, $id_tugas);
            }
        }

        redirect('sk');
    }
    
    public function get_kelompok()
    {
        $tahun = $this->input->post('tahun');
        $data = $this->M_sk->get_kelompok_by_tahun($tahun);
        echo json_encode($data);
    }
    
    public function get_tugas()
    {
        $tahun    = $this->input->post('tahun');
        $kelompok = $this->input->post('kelompok_anggaran');
    
        $data = $this->M_sk->get_tugas_filtered($tahun, $kelompok);
        echo json_encode($data);
    }


}
