<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kontrak extends CI_Controller
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
        // Kirim data ke view
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $data['username'] = $username;

        $data['ppk'] = $this->M_kontrak->list_ppk();

        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('kontrak', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('kontrak', $data);
            $this->load->view('template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }

    public function autocomplete()
    {
        $query = $this->input->get('query'); // Dapatkan query string
        $this->load->model('M_kontrak'); // Pastikan model dimuat

        // Ambil nama mitra yang sesuai dengan query
        $results = $this->M_kontrak->search_mitra($query);

        // Kembalikan respon JSON
        echo json_encode($results);
    }
    
    // public function autocomplete()
    // {
    //     $query = $this->input->get('query');
    //     $tahun_kepka = $this->input->get('tahun_kepka');
    
    //     $this->load->model('M_kontrak');
    
    //     $results = $this->M_kontrak->search_mitra($query, $tahun_kepka);
    
    //     echo json_encode($results);
    // }


    public function tampil_data()
    {
        $keyword = $this->input->post('keyword');
        $data = $this->M_kontrak->get_data($keyword);
        echo json_encode($data);
    }

    public function tampil_kegiatan()
    {
        $jenis_kegiatan = $this->input->post('jenis_kegiatan');
        $data = $this->M_kontrak->get_data_tugas($jenis_kegiatan);
        echo json_encode($data);
    }

    public function tampil_kelompok_anggaran()
    {
        $data = $this->M_kontrak->get_all_kelompok_anggaran();
        echo json_encode($data);
    }

    public function tampil_kegiatan_by_kelompok_anggaran()
    {
        $kelompok_anggaran = $this->input->post('kelompok_anggaran');
        $tahun = $this->input->post('tahun');
    
        $data = $this->M_kontrak
            ->get_data_tugas_by_kelompok_anggaran($kelompok_anggaran, $tahun);
    
        echo json_encode($data);
    }

    public function simpan_data()
    {
        $t_spk = $this->input->post('t_spk');
        $t_idmitra = $this->input->post('t_idmitra');
        $id_tugas = $this->input->post('id_tugas');
        $volume = $this->input->post('volume');
        $jumlah = $this->input->post('jumlah');

        // Cek apakah data dengan t_spk dan id_tugas sudah ada dalam database
        $existing_data = $this->M_kontrak->get_existing_data($t_spk, $id_tugas);

        if ($existing_data) {
            // Jika sudah ada, tambahkan volume dan jumlah baru ke volume dan jumlah yang sudah ada
            $existing_volume = $existing_data->volume;
            $existing_jumlah = $existing_data->nilai_perjanjian;

            $volume += $existing_volume;
            $jumlah += $existing_jumlah;

            // Perbarui data yang sudah ada di database
            $data = array(
                'volume' => $volume,
                'nilai_perjanjian' => $jumlah
            );
            $this->db->where('no_spk', $t_spk);
            $this->db->where('id_tugas', $id_tugas);
            $this->db->update('t_spkrinci', $data);
        } else {
            // Jika belum ada, tambahkan data baru ke database
            $data = array(
                'no_spk' => $t_spk,
                'id_sobat' => $t_idmitra,
                'id_tugas' => $id_tugas,
                'volume' => $volume,
                'nilai_perjanjian' => $jumlah
            );
            $this->db->insert('t_spkrinci', $data);
        }
    }
    //  AUTOFILL UNTUK OTOMATIS MENGISI DATA 
    public function autofill_mitra()
    {
        if ($this->input->post('nama_mitra')) {
            echo json_encode($this->M_kontrak->auto_complete($this->input->post('nama_mitra')));
        }
    }
    public function autofill_tugas()
    {
        if ($this->input->post('id_tugas')) {
            echo json_encode($this->M_kontrak->auto_tugas($this->input->post('id_tugas')));
        }
    }
    public function autofill_ppk()
    {
        if ($this->input->post('ppk')) {
            echo json_encode($this->M_kontrak->auto_ppk($this->input->post('ppk')));
        }
    }

    // Metode untuk menghapus data berdasarkan no_spk dan id_tugas
    public function hapus_data()
    {
        $no_spk = $this->input->post('no_spk');
        $id_tugas = $this->input->post('id_tugas');
        $response = $this->M_kontrak->hapus_data($no_spk, $id_tugas);
        echo json_encode($response);
    }

    // public function generate()
    // {
    //     // Mendapatkan bulan dan tahun dari inputan date
    //     $input_date = $this->input->post('tanggal_spk');
    //     $year = date('Y', strtotime($input_date));
    //     $month = date('m', strtotime($input_date));

    //     // Mendapatkan nomor terakhir berdasarkan bulan dan tahun
    //     $last_number = $this->M_kontrak->get_last_spk_number($month, $year);

    //     // Mendapatkan 4 karakter pertama dari nomor terakhir
    //     $number = substr($last_number, 0, 4);

    //     // Membuat nomor baru
    //     $new_number = sprintf('%04d', intval($number) + 1);
    //     $spk_number = $new_number . "/6109-SPK/PPIS/{$month}/{$year}";

    //     // Response nomor baru
    //     echo json_encode(array('spk_number' => $spk_number));

    //     // Simpan nomor SPK ke dalam database
    //     $id_sobat = $this->input->post('id_sobat');
    //     $ppk = $this->input->post('ppk');

    //     // Check if id_sobat already exists in the same month
    //     $isIdSobatExists = $this->M_kontrak->check_id_sobat_in_month($id_sobat, $month, $year);
    //     if ($isIdSobatExists) {
    //         echo json_encode(array('error' => 'ID Sobat already exists for this month.'));
    //         return;
    //     }

    //     $data = array(
    //         'no_spk' => $spk_number,
    //         'tanggal_spk' => $input_date,
    //         'id_sobat' => $id_sobat,
    //         'nip_ppk' => $ppk
    //     );

    //     if ($this->M_kontrak->save_or_update_spk($data)) {
    //         $this->session->set_flashdata('success', 'Data berhasil disimpan atau diperbarui');
    //     } else {
    //         $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan atau memperbarui data');
    //     }
    // }
    
    public function generate()
    {
        // Mendapatkan bulan dan tahun dari inputan tanggal
        $input_date = $this->input->post('tanggal_spk');
        $year = date('Y', strtotime($input_date));
        $month = date('m', strtotime($input_date));
        $formatted_date = date('d-m-Y', strtotime($input_date));

        // Simpan inputan ID Sobat dan PPK
        $id_sobat = $this->input->post('id_sobat');
        $ppk = $this->input->post('ppk');
        
        $isIdSobatExists = $this->M_kontrak->check_id_sobat_in_month($id_sobat, $month, $year);
        if ($isIdSobatExists) {
            // Retrieve existing SPK number
            $existing_spk = $this->M_kontrak->get_existing_spk_number($id_sobat, $month, $year);
            echo json_encode(array(
                'error' => 'Apakah Ingin Menambahkan Kegiatannya yang lain?',
                'spk_number' => $existing_spk,
                'tanggal_spk' => $formatted_date 
            ));
            return;
        }

        // Mendapatkan nomor terakhir berdasarkan bulan dan tahun
        $last_number = $this->M_kontrak->get_last_spk_number($month, $year);

        // Mendapatkan 4 karakter pertama dari nomor terakhir
        $number = substr($last_number, 0, 4);

        // Membuat nomor SPK baru
        $new_number = sprintf('%04d', intval($number) + 1);
        $spk_number = $new_number . "/6109-SPK/PPIS/{$month}/{$year}";

        // Siapkan data untuk disimpan
        $data = array(
            'no_spk' => $spk_number,
            'tanggal_spk' => $input_date,
            'id_sobat' => $id_sobat,
            'nip_ppk' => $ppk
        );

        // Simpan atau perbarui data ke database
        if ($this->M_kontrak->save_or_update_spk($data)) {
            // Mengirimkan respons sukses dengan nomor SPK
            echo json_encode(array('spk_number' => $spk_number, 'success' => 'Data berhasil disimpan atau diperbarui.'));
        } else {
            // Mengirimkan respons error jika penyimpanan gagal
            echo json_encode(array('error' => 'Terjadi kesalahan saat menyimpan atau memperbarui data.'));
        }
    }


    public function simpan_spk()
    {
        date_default_timezone_set('Asia/Jakarta');
        $no_spk = $this->input->post('no_spk');
        $tanggal_spk = $this->input->post('tanggal_spk');
        $total_perjanjian = $this->input->post('total_perjanjian');
        $id_sobat = $this->input->post('id_sobat');
        $ppk = $this->input->post('ppk');
        $username = $this->session->userdata('username');
        $created_at = date('Y-m-d H:i:s'); // Current datetime

        // Lakukan penyimpanan data ke dalam tabel t_spk
        // Misalnya:
        $data = array(
            'no_spk' => $no_spk,
            'tanggal_spk' => $tanggal_spk,
            'total_perjanjian' => $total_perjanjian,
            'id_sobat' => $id_sobat,
            'nip_ppk' => $ppk
            // Tambahkan kolom lainnya sesuai kebutuhan
        );

        // Periksa apakah entitas dengan nomor SPK tertentu sudah ada di database
        $existing_data = $this->M_kontrak->get_spk_by_no($no_spk);

        // Jika data sudah ada, lakukan pembaruan; jika tidak, lakukan penyimpanan baru
        if ($existing_data) {
            // Ambil data log sebelumnya
            $existing_log = $existing_data['log'];

            // Tambahkan catatan log pembaruan
            $updated_log = $existing_log . "\n" . $username . "/" . $created_at . ")";

            // Update data SPK dan log
            $data['log'] = $updated_log;
            $this->M_kontrak->update_spk($no_spk, $data);
        } else {
            // Tambahkan catatan log penciptaan
            $log = $username . " - " . $created_at;
            $data['log'] = $log;

            // Simpan data SPK beserta log
            $this->M_kontrak->simpan_data_spk($data);
        }

        // Response ke frontend
        echo json_encode(array('status' => 'success'));
    }


    public function hapus_spk()
    {
        $no_spk = $this->input->post('no_spk');

        // Panggil fungsi hapus data SPK dari model
        $success = $this->M_kontrak->hapus_data_spk($no_spk);

        // Response ke frontend
        echo json_encode(array('success' => $success));
    }
}
