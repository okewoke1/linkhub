<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');
    }

    // Displays the login form
    public function login()
    {
        // Your login form view
        $this->load->view('login_form');
    }

    // Handles login form submission
    public function process_login()
    {
        log_message('debug', 'Enter login request');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Validate user credentials against your centralized 'users' table
        $user = $this->User_model->get_user_by_email_and_password($email, $password);

        if ($user) {
            log_message('debug', 'Enter user found');
            // --- Crucial Part: Fetch Roles and Store in Shared Session ---
            $user_roles = $this->User_model->get_user_roles($user->id);
            $id_penilai = $this->User_model->get_id_sispek($user->id);

            // Login successful: Set shared session data
            $user_session_data = array(
                'id' => $user->id,
                'id_penilai' => $id_penilai,
                'email' => $user->email,
                'nama' => $user->nama,
                'user_roles' => $user_roles,
                'nip' => $user->nip,
                'nip_bps' => $user->nip_bps,
                'username' => $user->nama,
                'img_loc' => $user->img_loc,
                'logged_in' => TRUE,
                'is_logged_in' => TRUE
            );
            $this->session->set_userdata($user_session_data); // This updates the shared DB session

            $intended_url = $this->session->userdata('intended_url');


            if ($intended_url) {
                if (strpos($intended_url, 'sibukgan') !== false) {
                    if (in_array('sibukgan admin', $user_roles)) {
                        redirect('http://sibukgan.dev.test/administrator/dashboard', 'refresh');
                    } elseif (in_array('sibukgan user', $user_roles)) {
                        redirect('http://sibukgan.dev.test/user/dashboard', 'refresh');
                    } else {
                        // User does not have access to this app
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Tidak memiliki akses untuk aplikasi ini.<br><u>' . $intended_url . '</u>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                        redirect(base_url('auth/login'), 'refresh');
                    }
                } elseif (strpos($intended_url, 'simakand') !== false) {
                    if (in_array('simakand admin', $user_roles)) {
                        redirect('http://simakand.dev.test/administrator/dashboard', 'refresh');
                    } elseif (in_array('simakand user', $user_roles)) {
                        redirect('http://simakand.dev.test/user/dashboard', 'refresh');
                    } elseif (in_array('simakand operator', $user_roles)) {
                        redirect('http://simakand.dev.test/operator/dashboard', 'refresh');
                    } else {
                        // User does not have access to this app
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Tidak memiliki akses untuk aplikasi ini.<br><u>' . $intended_url . '</u>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                        redirect(base_url('auth/login'), 'refresh');
                    }
                } elseif (strpos($intended_url, 'sispek') !== false) {
                    redirect('http://sispek.dev.test/dashboard', 'refresh');
                } else {
                    // No specific app match, redirect to Linkhub home
                    redirect(base_url(), 'refresh');
                }
            } else {
                // No specific intended URL, redirect to Linkhub home
                redirect(base_url(), 'refresh');
            }
        } else {
            // Login failed: Set flashdata message for the login form
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email atau password salah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect(base_url('auth/login'), 'refresh');
        }
    }

    public function ganti_password()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'akun';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'kelola'
            );
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('ganti_password_form');
        $this->load->view('template/footer');
    }

    public function handle_ganti_password($user_id)
    {
        $password_lama = $this->input->post('password-lama');
        $password_baru = $this->input->post('password-baru');
        $konfirmasi_password_baru = $this->input->post('konfirmasi-password-baru');

        // Validasi password baru dan konfirmasi
        if ($password_baru !== $konfirmasi_password_baru) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Konfirmasi password baru tidak cocok!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect(base_url('auth/ganti_password'), 'refresh');
            return;
        }

        // Validasi password lama
        if (!$this->User_model->validate_user_password($user_id, $password_lama)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password lama salah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect(base_url('auth/ganti_password'), 'refresh');
            return;
        }

        // Update password baru
        if ($this->User_model->update_user_password($user_id, $password_baru)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Password berhasil diubah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect(base_url('auth/ganti_password'), 'refresh');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Terjadi kesalahan saat mengubah password. Silakan coba lagi.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect(base_url('auth/ganti_password'), 'refresh');
        }
    }

    // Handles user logout
    public function logout()
    {
        // Destroy the shared session data
        $this->session->sess_destroy();

        // Redirect to Linkhub's login page or home page
        redirect(base_url(), 'refresh');
    }
}
