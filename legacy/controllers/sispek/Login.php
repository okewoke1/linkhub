<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_login');
        // Library session sudah di-load secara otomatis karena ditambahkan di autoload.php
    }

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            redirect('sispek/dashboard');  // Redirect to dashboard if already logged in
        }
        $data['error'] = $this->session->flashdata('error');
        $data['success'] = $this->session->flashdata('success');
        $this->load->view('sispek/login', $data);
    }

    public function auth()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->M_login->check_user($username, $password);

        if ($user) {
            if ($user->is_active) {
                $session_data = array(
                    'username' => $user->username,
                    'level' => $user->level,
                    'is_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                $this->session->set_flashdata('success', 'Login berhasil!');
                redirect('sispek/dashboard');  // Ubah 'dashboard' ke controller tujuan setelah login
            } else {
                $this->session->set_flashdata('error', 'Akun tidak aktif.');
                redirect('sispek/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah.');
            redirect('sispek/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('sispek/login');
    }
}
