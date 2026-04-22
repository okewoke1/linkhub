<?php
class Daftarbast extends CI_Controller
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

    public function index()
    {
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');

        // Get filter inputs
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        // Filter bast based on the selected month and year
        $data['daftarbast'] = $this->M_daftarbast->get_filtered_bast($bulan, $tahun);

        $data['username'] = $username;

        if ($level == '1') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar_adm', $data);
            $this->load->view('sispek/daftarbast', $data);
            $this->load->view('sispek/template/footer');
        } else if ($level == '2') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar', $data);
            $this->load->view('sispek/daftarbast', $data);
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
    

     public function cek_bast() {
        $no_spk = $this->input->post('no_spk');
        
        // Mengambil BAST berdasarkan no_spk
        $bast = $this->M_daftarbast->get_bast_by_no_spk($no_spk);
        
        if ($bast) {
            // Jika BAST ditemukan, kirimkan data
            $response = [
                'exists' => true,
                'no_bast' => substr($bast->no_bast, 0, 4), // Ambil substring 4 karakter dari no_bast
                'tanggal_spk' => date('d-m-Y', strtotime($bast->tanggal_spk)), // Format tanggal BAST
                'bulan' => date('m', strtotime($bast->tanggal_spk)), // Bulan dari tanggal SPK
                'tahun' => date('Y', strtotime($bast->tanggal_spk))  // Tahun dari tanggal SPK
            ];
        } else {
            // Jika BAST belum ditemukan, ambil tanggal_spk dari t_spk
            $this->db->select('tanggal_spk'); // Ambil hanya tanggal_spk
            $this->db->from('t_spk');
            $this->db->where('no_spk', $no_spk);
            $query_spk = $this->db->get();
    
            if ($query_spk->num_rows() > 0) {
                $spk_data = $query_spk->row(); // Ambil baris data
    
                // Kirim respons dengan tanggal_spk
                $response = [
                    'exists' => false,
                    'tanggal_spk' => date('d-m-Y', strtotime($spk_data->tanggal_spk)) // Format tanggal SPK
                ];
            } else {
                // Jika SPK tidak ditemukan
                $response = [
                    'exists' => false,
                    'tanggal_spk' => null // Kirimkan null jika tidak ada
                ];
            }
        }
        
        echo json_encode($response);
    }

    
    public function simpan_bast()
    {
        // Ambil data dari form modal
        $no_spk = $this->input->post('no_spk');
        $no_bast = $this->input->post('no_bast');
        $tanggal_bast = $this->input->post('tanggal_bast');

        // Panggil fungsi simpan_bast di model
        $saved = $this->M_daftarbast->simpan_bast($no_bast, $tanggal_bast, $no_spk);

           // Cek apakah penyimpanan berhasil
        if ($saved) {
            // Kirim respons sukses jika berhasil disimpan
            $response = array(
                'status' => 'success',
                'message' => 'Data BAST berhasil disimpan.',
                'no_bast' => $no_bast // Kirimkan nomor BAST ke JS
            );
            echo json_encode($response);
        } else {
            // Kirim respons error jika penyimpanan gagal
            $response = array(
                'status' => 'error',
                'message' => 'Gagal menyimpan data BAST. Silakan coba lagi.'
            );
            echo json_encode($response);
        }
    }
    
    public function hapus_bast() {
        // Ambil no_bast yang dikirim dari AJAX dan decode
        $encoded_no_bast = $this->input->post('no_bast');
        $no_bast = base64_decode($encoded_no_bast); // Dekode Base64

        // Cek apakah no_bast valid sebelum menghapus
        if ($no_bast) {
            // Panggil model untuk menghapus BAST
            $deleted = $this->M_daftarbast->hapus_bast($no_bast);

            if ($deleted) {
                // Kirim respons sukses
                $response = array(
                    'status' => 'success',
                    'message' => 'BAST berhasil dihapus.'
                );
            } else {
                // Kirim respons error jika gagal dihapus
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal menghapus BAST. Silakan coba lagi.'
                );
            }
        } else {
            // Kirim respons error jika no_bast tidak valid
            $response = array(
                'status' => 'error',
                'message' => 'Nomor BAST tidak valid.'
            );
        }

        echo json_encode($response);
    }
}
