<?php
class kegiatan extends CI_Controller
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

        $data['t_anggaran'] = $this->Data_kegiatan->list_anggaran();
        $data['kegiatan'] = $this->Data_kegiatan->tampil_data()->result();

        if ($level == '1') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar_adm', $data);
            $this->load->view('sispek/kegiatan', $data);
            $this->load->view('sispek/template/footer');
        } else if ($level == '2') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar', $data);
            $this->load->view('sispek/kegiatan', $data);
            $this->load->view('sispek/template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }

    public function tambah_aksi()
    {
        $jabatan = $this->input->post('jabatan');
        $uraian_tugas = $this->input->post('uraian_tugas');
        $satuan = $this->input->post('satuan');
        $honor = $this->input->post('honor');
        $kode_anggaran = $this->input->post('kode_anggaran');
        $kelompok_anggaran = $this->input->post('kelompok_anggaran');

        $data = array(
            // 'id_tugas' => $id_tugas,
            'jabatan' => $jabatan,
            'uraian_tugas' => $uraian_tugas,
            'satuan' => $satuan,
            'honor' => $honor,
            'kode_anggaran' => $kode_anggaran,
            'kelompok_anggaran' => $kelompok_anggaran,
        );

        $this->Data_kegiatan->input_data($data, "t_tugas");
        redirect('sispek/kegiatan/index');
    }

    public function hapus($id_tugas)
    {
        $data = array('id_tugas' => $id_tugas);
        $this->Data_kegiatan->hapus_data($data, "t_tugas");
        redirect('sispek/kegiatan/index');
    }
    // func edit_kegiatan di sesuaikan nama 
    public function edit_kegiatan($id_tugas)
    {
        // Kirim data ke view
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $data['username'] = $username;

        $where = array('id_tugas' => $id_tugas);
        $data['kegiatan'] = $this->Data_kegiatan->edit_data($where, 't_tugas')->result();
        $data['t_anggaran'] = $this->Data_kegiatan->list_anggaran();

        $level = $this->session->userdata('level');
        if ($level == '1') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar_adm', $data);
            $this->load->view('sispek/edit_kegiatan', $data);
            $this->load->view('sispek/template/footer');
        } else if ($level == '2') {
            $this->load->view('sispek/template/header');
            $this->load->view('sispek/template/sidebar', $data);
            $this->load->view('sispek/edit_kegiatan', $data);
            $this->load->view('sispek/template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }
    public function update()
    {
        $jabatan = $this->input->post('jabatan');
        $id_lama = $this->input->post('id_lama');
        $id_tugas = $this->input->post('id_tugas');
        $uraian_tugas = $this->input->post('uraian_tugas');
        $satuan = $this->input->post('satuan');
        $honor = $this->input->post('honor');
        $kelompok_anggaran = $this->input->post('kelompok_anggaran');
        $kode_anggaran = $this->input->post('kode_anggaran');

        $data = array(
            'jabatan' => $jabatan,
            'id_tugas' => $id_tugas,
            'uraian_tugas' => $uraian_tugas,
            'satuan' => $satuan,
            'honor' => $honor,
            'kelompok_anggaran' => $kelompok_anggaran,
            'kode_anggaran' => $kode_anggaran,
        );
        $where = array(
            'id_tugas' => $id_lama
        );
        $this->Data_kegiatan->update_data($where, $data, 't_tugas');
        redirect('sispek/kegiatan/index');
    }

    public function autofill_kode_anggaran()
    {
        if ($this->input->post('kelompok_anggaran')) {
            echo json_encode($this->Data_kegiatan->auto_kode_anggaran($this->input->post('kelompok_anggaran')));
        }
    }
}
