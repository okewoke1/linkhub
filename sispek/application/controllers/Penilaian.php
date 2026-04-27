<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');
        }
        $this->load->model('M_penilaian');
    }

    public function index() {
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $id_penilai = $this->session->userdata('id_penilai');


        $bulan = $this->input->get('bulan') ?? date('n');
        $tahun = $this->input->get('tahun') ?? date('Y');
        
        $data['is_locked'] = $this->M_penilaian->kunciPeriodePenilaian($bulan, $tahun);
    
        $data['username'] = $username;
        $data['selected_bulan'] = $bulan;
        $data['selected_tahun'] = $tahun;

        $data['users'] = $this->M_penilaian->getUsersWithPenilaian($bulan, $tahun, $id_penilai, $id_penilai);
    
        if (in_array($level, ['1', '2', '3'])) {
            $this->load->view('template/header');
            $this->load->view('template/' . ($level == '1' ? 'sidebar_adm' : 'sidebar'), $data);
            $this->load->view('form_penilaian', $data);
            $this->load->view('template/footer');
        } else {
            redirect('login');
        }
      

    }

    public function simpan() {
        if (!$this->input->is_ajax_request()) {
            show_404();
            return;
        }
    
        $response = ['status' => 'error', 'message' => 'Terjadi kesalahan'];
    
        $post_data = $this->input->post();
        $id_user = $this->input->post('id_user');
        $id_penilai = $this->session->userdata('id_penilai');
        $bulan = (int) $this->input->post('periode_bulan');
        $tahun = (int) $this->input->post('periode_tahun');
    
        if ($this->M_penilaian->kunciPeriodePenilaian($bulan, $tahun)) {
            $response['message'] = 'Periode ini sudah dikunci, tidak bisa diubah.';
            echo json_encode($response); return;
        }
    
        $nilai_fields = ['berorientasi_pelayanan', 'akuntabel', 'kompeten', 'harmonis', 'loyal', 'adaptif', 'kolaboratif'];
        foreach ($nilai_fields as $field) {
            $nilai = $this->input->post($field);
            if (!is_numeric($nilai) || $nilai < 1 || $nilai > 100) {
                $response['message'] = "Nilai $field tidak valid.";
                echo json_encode($response); return;
            }
        }
    
        if (!$id_user || !$bulan || !$tahun) {
            $response['message'] = 'Data user atau periode tidak valid.';
            echo json_encode($response); return;
        }
    
        $exists = $this->M_penilaian->cekPenilaianExist($id_user, $id_penilai, $bulan, $tahun);
        if ($exists) {
            $response['message'] = 'Penilaian sudah dilakukan untuk bulan ini.';
            echo json_encode($response); return;
        }
    
        $data = [
            'id_user' => $id_user,
            'id_penilai' => $id_penilai,
            'berorientasi_pelayanan' => $this->input->post('berorientasi_pelayanan'),
            'akuntabel' => $this->input->post('akuntabel'),
            'kompeten' => $this->input->post('kompeten'),
            'harmonis' => $this->input->post('harmonis'),
            'loyal' => $this->input->post('loyal'),
            'adaptif' => $this->input->post('adaptif'),
            'kolaboratif' => $this->input->post('kolaboratif'),
            'tanggal_penilaian' => date('Y-m-d H:i:s'),
            'periode_bulan' => $bulan,
            'periode_tahun' => $tahun,
        ];
    
        $this->M_penilaian->insertPenilaian($data);
        $response = ['status' => 'success', 'message' => 'Penilaian berhasil disimpan.'];
        echo json_encode($response);
    }

    
    public function hapus() {
        

    
        $id_user = $this->input->post('id_user');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $id_penilai = $this->session->userdata('id_penilai');
        
        // Sebelum simpan/hapus, tambahkan ini
        if ($this->M_penilaian->kunciPeriodePenilaian($bulan, $tahun)) {
            $this->session->set_flashdata('error', 'Periode ini sudah dikunci, tidak bisa diubah.');
            redirect('penilaian');
            return;
        }
    
        // Hapus penilaian sesuai filter
        $this->db->where([
            'id_user' => $id_user,
            'id_penilai' => $id_penilai,
            'periode_bulan' => $bulan,
            'periode_tahun' => $tahun
        ]);
        $this->db->delete('penilaian_berakhlak');
    
        echo json_encode(['status' => 'ok']);
    }
    
    public function kunci_periode()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $aksi = $this->input->post('aksi');

        if ($aksi === 'kunci') {
            $this->M_penilaian->kunciPeriode($bulan, $tahun);
            $this->session->set_flashdata('msg', '? Penilaian berhasil dikunci.');
        } elseif ($aksi === 'buka') {
            $this->M_penilaian->bukaPeriodePenilaian($bulan, $tahun);
            $this->session->set_flashdata('msg', '? Penilaian berhasil dibuka.');
        } else {
            $this->session->set_flashdata('msg', '? Aksi tidak dikenali.');
        }

        redirect('penilaian');
    }

    public function rekap_penilaian()
    {
        $level = $this->session->userdata('level');
        if (!in_array($level, ['1', '2', '3'])) {
            redirect('login');
            return;
        }
        
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
    

        $bulan = $this->input->get('bulan') ?? date('n');
        $tahun = $this->input->get('tahun') ?? date('Y');
        
        $data['username'] = $username;
        $data['selected_bulan'] = $bulan;
        $data['selected_tahun'] = $tahun;
    
        // Ambil data rekap
        $data['rekap'] = $this->M_penilaian->getRekapRataRata($bulan, $tahun);
        $data['status_penilai'] = $this->M_penilaian->getStatusPenilaianPerPenilai($bulan, $tahun);

    
        // Load halaman lengkap dengan sidebar sesuai level
        $this->load->view('template/header');
        $this->load->view('template/' . ($level == '1' ? 'sidebar_adm' : 'sidebar'), $data);
        $this->load->view('rekap_penilaian', $data);  // pastikan file ini ada
        $this->load->view('template/footer');
    }


}
