<?php
class Datamitra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['is_logged_in'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda belum login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sispek/login');
        }
    }

     public function index($id_sobat)
    {
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        
        // Mendapatkan detail mitra berdasarkan ID Sobat
        $data['mitra'] = $this->M_datamitra->get_mitra_detail($id_sobat);

        // Mendapatkan daftar SPK berdasarkan ID Sobat, bulan, dan tahun
        $data['spk_data'] = $this->M_datamitra->get_mitra_spk($id_sobat, $bulan, $tahun);


        $data['username'] = $username;
        $data['level'] = $level;

        if ($level == '1') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar_adm', $data);
            $this->load->view('sispek/datamitra', $data);
            $this->load->view('sispek/template/footer');
        } else if ($level == '2') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar', $data);
            $this->load->view('sispek/datamitra', $data);
            $this->load->view('sispek/template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }

    public function cetak_bast($no_bast, $tanggal_bast) {
       
       
        // Mengambil detail BAST
        $data['bast'] = $this->M_daftarbast->cetak_detail_bast($no_bast, $tanggal_bast);
    
        // Memuat tampilan
        $this->load->view('sispek/cetak_bast', $data);
    }

}
