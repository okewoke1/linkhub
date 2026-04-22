<?php
class Daftarkegiatan extends CI_Controller
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
        $kelompok_anggaran = $this->input->get('kelompok_anggaran');

        // Filter SPK based on the selected month, year, and kelompok anggaran
        $data['dataspk'] = $this->M_daftarkegiatan->get_filtered_spk($bulan, $tahun, $kelompok_anggaran);

        // Ambil kelompok anggaran
        $data['kelompok_anggaran_array'] = $this->M_daftarkegiatan->get_kelompok_anggaran();

        $data['username'] = $username;
        $data['level'] = $level;


        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('daftarkegiatan', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('daftarkegiatan', $data);
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
}
