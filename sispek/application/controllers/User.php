<?php
class user extends CI_Controller
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
        $data['level'] = $this->session->userdata('level'); // Memastikan $level tersedia
        // $data['user'] = $this->M_user->tampil_data()->result();

        $level = $this->session->userdata('level');
        if ($level == '1') {
            $data['user'] = $this->M_user->tampil_data()->result();
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('user', $data);
            $this->load->view('template/footer');
        } elseif ($level == '2') {
            $data['usernames'] = $this->M_user->get_usernames()->result(); // Fetch only usernames
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('user', $data);
            $this->load->view('template/footer');
        } else {
            $this->load->view('custoM_404');
            // show_404();
            // redirect('login');
        }
    }

    public function tambah_aksi()
    {

        $user = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $is_active = $this->input->post('is_active');
        $pw_md5 = md5($password);

        // Cek apakah data sudah ada di database
        $existing_user = $this->M_user->cek_user($user);

        // Buat variabel untuk menyimpan pesan
        $pesan = '';

        if ($existing_user) {
            // Data dengan kode user yang sama sudah ada
            $pesan = 'Username tersebut sudah terdaftar.';
        }

        // Jika ada pesan, kirimkan sebagai pesan error
        if (!empty($pesan)) {
            $response['status'] = 'error';
            $response['message'] = $pesan;
        } else {
            // Data belum ada, lanjutkan proses
            $data = array(
                'username' => $user,
                'password' => $pw_md5,
                'level' => $level,
                'is_active' => $is_active,
            );

            // Masukkan data ke dalam database
            $this->M_user->input_data($data);

            // Set status sukses
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil ditambahkan.';
        }

        // Return respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function hapus($id)
    {
        $data = array('id' => $id);
        $this->M_user->hapus_data($data, "master_users");
        redirect('user/index');
    }

    public function edit_user()
    {
        // Ambil data dari form
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $level = $this->input->post('level');
        $is_active = $this->input->post('is_active');

        // Data baru yang akan diupdate
        $data = array(
            'username' => $username,
            'level' => $level,
            'is_active' => $is_active,
        );

        // Kondisi untuk menemukan data yang akan diupdate
        $where = array(
            'id' => $id
        );

        // Panggil fungsi model untuk melakukan update
        $update = $this->M_user->update_data($where, $data);

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
    public function ganti_password()
    {
        // Ambil data dari form
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $md5_pw = md5($password);

        // Data baru yang akan diupdate
        $data = array(
            'password' => $md5_pw
        );

        // Kondisi untuk menemukan data yang akan diupdate
        $where = array(
            'id' => $id
        );

        // Panggil fungsi model untuk melakukan update
        $update = $this->M_user->update_pw($where, $data);

        // Cek jika update berhasil
        if ($update) {
            // Jika berhasil, kirimkan respons JSON dengan status success
            $response['status'] = 'success';
            $response['message'] = 'Password berhasil diperbarui.';
        } else {
            // Jika gagal, kirimkan respons JSON dengan status error
            $response['status'] = 'error';
            $response['message'] = 'Gagal memperbarui Password.';
        }

        // Mengirimkan respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
