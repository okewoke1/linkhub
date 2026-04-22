<?php
class anggaran extends CI_Controller
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

        $data['anggaran'] = $this->M_anggaran->tampil_data()->result();

        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('anggaran', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('anggaran', $data);
            $this->load->view('template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }

    public function tambah_aksi()
    {
        $kode_anggaran = $this->input->post('kode_anggaran');
        $kelompok_anggaran = $this->input->post('kelompok_anggaran');

        // Cek apakah data sudah ada di database
        $existing_kode_anggaran = $this->M_anggaran->cek_kode_anggaran($kode_anggaran);
        $existing_kelompok_anggaran = $this->M_anggaran->cek_kelompok_anggaran($kelompok_anggaran);

        // Buat variabel untuk menyimpan pesan
        $pesan = '';

        if ($existing_kode_anggaran) {
            // Data dengan kode anggaran yang sama sudah ada
            $pesan = 'Kode anggaran tersebut sudah terdaftar.';
        }

        if ($existing_kelompok_anggaran) {
            // Data dengan kelompok anggaran yang sama sudah ada
            $pesan = 'Kelompok anggaran tersebut sudah terdaftar.';
        }

        // Jika ada pesan, kirimkan sebagai pesan error
        if (!empty($pesan)) {
            $response['status'] = 'error';
            $response['message'] = $pesan;
        } else {
            // Data belum ada, lanjutkan proses
            $data = array(
                'kode_anggaran' => $kode_anggaran,
                'kelompok_anggaran' => $kelompok_anggaran,
            );

            // Masukkan data ke dalam database
            $this->M_anggaran->input_data($data);

            // Set status sukses
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil ditambahkan.';
        }

        // Return respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function hapus($kode_anggaran)
    {
        $data = array('kode_anggaran' => $kode_anggaran);
        $this->M_anggaran->hapus_data($data, "t_anggaran");
        redirect('anggaran/index');
    }

    public function edit_anggaran()
    {
        // Ambil data dari form
        $kode_anggaran_lama = $this->input->post('kode_lama');
        $kode_anggaran_baru = $this->input->post('kode');
        $kelompok_anggaran = $this->input->post('kelompok');
        $bidang = $this->input->post('bidang');

        // Data baru yang akan diupdate
        $data = array(
            'kode_anggaran' => $kode_anggaran_baru,
            'kelompok_anggaran' => $kelompok_anggaran,
            'bidang_teknis' => $bidang,
        );

        // Kondisi untuk menemukan data yang akan diupdate
        $where = array(
            'kode_anggaran' => $kode_anggaran_lama
        );

        // Panggil fungsi model untuk melakukan update
        $update = $this->M_anggaran->update_data($where, $data);

        // Cek jika update berhasil
        if ($update) {
            // Jika berhasil, kirimkan respons JSON dengan status success
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil diperbarui.';
        } else {
            // Jika gagal, kirimkan respons JSON dengan status error
            $response['status'] = 'error';
            $response['message'] = 'Gagal memperbarui data.';
        }

        // Mengirimkan respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
