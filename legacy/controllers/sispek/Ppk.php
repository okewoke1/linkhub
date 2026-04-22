<?php
class ppk extends CI_Controller
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
        // Kirim data ke view
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $data['username'] = $username;

        $data['ppk'] = $this->M_ppk->tampil_data()->result();

        $level = $this->session->userdata('level');
        if ($level == '1') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar_adm', $data);
            $this->load->view('sispek/ppk', $data);
            $this->load->view('sispek/template/footer');
            // } else if ($level == '2') {
            //     $this->load->view('sispek/template/header');
            //     $this->load->view('sispek/template/sidebar', $data);
            //     $this->load->view('sispek/ppk', $data);
            //     $this->load->view('sispek/template/footer');
        } else {
            $this->load->view('sispek/custoM_404');
            // show_404();
            // redirect('sispek/login');
        }
    }

    public function tambah_aksi()
    {
        $nip = $this->input->post('nip');
        $ppk = $this->input->post('ppk');

        // Cek apakah data sudah ada di database
        $existing_nip = $this->M_ppk->cek_nip($nip);
        $existing_ppk = $this->M_ppk->cek_ppk($ppk);

        // Buat variabel untuk menyimpan pesan
        $pesan = '';

        if ($existing_nip) {
            // Data dengan kode ppk yang sama sudah ada
            $pesan = 'Kode ppk tersebut sudah terdaftar.';
        }

        if ($existing_ppk) {
            // Data dengan kelompok ppk yang sama sudah ada
            $pesan = 'Kelompok ppk tersebut sudah terdaftar.';
        }

        // Jika ada pesan, kirimkan sebagai pesan error
        if (!empty($pesan)) {
            $response['status'] = 'error';
            $response['message'] = $pesan;
        } else {
            // Data belum ada, lanjutkan proses
            $data = array(
                'nip' => $nip,
                'ppk' => $ppk,
            );

            // Masukkan data ke dalam database
            $this->M_ppk->input_data($data);

            // Set status sukses
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil ditambahkan.';
        }

        // Return respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function hapus($nip)
    {
        $data = array('nip' => $nip);
        $this->M_ppk->hapus_data($data, "t_ppk");
        redirect('sispek/ppk/index');
    }

    public function edit_ppk()
    {
        // Ambil data dari form
        $nip_lama = $this->input->post('nip_lama');
        $nip_baru = $this->input->post('nip');
        $ppk = $this->input->post('ppk');

        // Data baru yang akan diupdate
        $data = array(
            'nip' => $nip_baru,
            'ppk' => $ppk,
        );

        // Kondisi untuk menemukan data yang akan diupdate
        $where = array(
            'nip' => $nip_lama
        );

        // Panggil fungsi model untuk melakukan update
        $update = $this->M_ppk->update_data($where, $data);

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
