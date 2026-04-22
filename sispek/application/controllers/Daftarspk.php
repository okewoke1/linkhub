<?php
class Daftarspk extends CI_Controller
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
            redirect('login');
        }
    }

    public function index()
    {
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');

        // Get filter inputs
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        // Filter SPK based on the selected month and year
        $data['daftarspk'] = $this->M_daftarspk->get_filtered_spk($bulan, $tahun);

        $data['username'] = $username;
        $data['level'] = $level;

        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('daftarspk', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('daftarspk', $data);
            $this->load->view('template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }

    public function detail($no_spk)
    {
        // Kirim data ke view
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['daftarspk'] = $this->M_daftarspk->get_all_spk();

        // Panggil detail_spk dengan nomor SPK lengkap
        $data['spk'] = $this->M_daftarspk->cetak_detail_spk($no_spk);
        $data['tabel'] = $this->M_daftarspk->cetak_tabel_detail_spk($no_spk);
        // Load view dengan data yang diperlukan

        $level = $this->session->userdata('level');
        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('detail_spk', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('detail_spk', $data);
            $this->load->view('template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }
    
    // public function cetak_bast($no_spk)
    // // public function cetak_bast()
    // {
    //     $data['spk'] = $this->M_daftarspk->cetak_detail_spk($no_spk);
    //     $data['tabel'] = $this->M_daftarspk->cetak_tabel_detail_spk($no_spk);

    //     // $this->load->view('cetak_bast');
    //     $this->load->view('cetak_bast', $data);
    // }
    
    
    public function cetak_spk($no_spk)
    {
        $data['spk'] = $this->M_daftarspk->cetak_detail_spk($no_spk);
        $data['tabel'] = $this->M_daftarspk->cetak_tabel_detail_spk($no_spk);

        $this->load->view('cetak_spk', $data);
    }

    public function hapus_daftarspk()
    {
        $no_spk = $this->input->post('no_spk');

        // Panggil fungsi hapus data SPK dari model
        $success = $this->M_daftarspk->hapus_data_spk($no_spk);

        // Response ke frontend
        echo json_encode(array('success' => $success));
        // redirect('daftarspk/index');
    }

    public function edit_spk($no_spk)
    {
        // Kirim data ke view
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['daftarspk'] = $this->M_daftarspk->get_all_spk();

        // Panggil detail_spk dengan nomor SPK lengkap
        $data['spk'] = $this->M_daftarspk->cetak_detail_spk($no_spk);
        $data['tabel'] = $this->M_daftarspk->cetak_tabel_detail_spk($no_spk);
        // Load view dengan data yang diperlukan

        $data['data_mitra'] = $this->M_kontrak->list_mitra();
        $data['data_kegiatan'] = $this->M_kontrak->list_tugas();

        $level = $this->session->userdata('level');
        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('edit_spk', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('edit_spk', $data);
            $this->load->view('template/footer');
        } else {
            $this->load->view('login');
        }
    }
    
    public function cek_bast() {
    $no_spk = $this->input->post('no_spk');
    
    // Query untuk cek apakah ada BAST terkait dengan no_spk
    $this->db->where('no_spk', $no_spk);
    $bast = $this->db->get('t_bast')->row();

    if ($bast) {
        // Jika ada BAST terkait
        echo json_encode(['has_bast' => true]);
    } else {
        // Jika tidak ada BAST terkait
        echo json_encode(['has_bast' => false]);
    }
}

}
