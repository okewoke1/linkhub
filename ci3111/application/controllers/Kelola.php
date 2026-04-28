<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tautan_model');
        $this->load->model('Folder_Skp_model');
        $this->load->model('Tim_model');
        $this->load->model('User_model');
        $this->load->model('Role_model');
        $this->load->model('Pengumuman_model');
        $this->load->library('pagination');
    }

    public function tautan()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'kelola';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'kelola'
            );
        }

        $data['title'] = 'Kelola Tautan';
        $data['desc'] = 'Menu kelola tautan yang dapat diakses oleh admin.';

        $config = array();
        $config["base_url"] = site_url('kelola/tautan');
        $config["total_rows"] = $this->Tautan_model->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        // Optional: Bootstrap 4/5 pagination styling
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['tautan'] = $this->Tautan_model->get_paginated($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        $data['tim'] = $this->Tim_model->get_all_tim();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('kelola_tautan', $data);
        $this->load->view('template/footer');
    }

    public function tautan_upload()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/tautan_thumbnail/';
        $config['allowed_types'] = 'webp|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);
        }

        $this->upload->initialize($config);

        if (!empty($_FILES['img']['name'])) {
            if ($this->upload->do_upload('img')) {
                $upload_data = $this->upload->data();
                $img_name = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('kelola/tautan');
                return;
            }
        } else {
            $img_name = null;
        }

        $data = [
            'nama'       => $this->input->post('nama'),
            'deskripsi'  => $this->input->post('desc'),
            'url'     => $this->input->post('url'),
            'master_tim_id' => $this->input->post('master_tim_id'),
            'img_loc'  => isset($img_name) ? 'uploads/tautan_thumbnail/' . $img_name : 'assets/img/hero-img.png',
        ];

        if ($this->Tautan_model->insert($data)) {
            $this->session->set_flashdata('success', 'Tautan berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan tautan.');
        }
        redirect('kelola/tautan');
    }

    public function tautan_edit($id)
    {
        $this->load->library('upload');

        $tautan = $this->Tautan_model->getById($id);
        $existing_img = $tautan->img_loc;

        // Handle image replacement
        if (!empty($_FILES['img']['name'])) {
            $config['upload_path'] = './uploads/tautan_thumbnail/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0755, true);
            }

            $this->upload->initialize($config);

            if ($this->upload->do_upload('img')) {
                // delete old file
                if (!empty($existing_img) && file_exists('./' . $existing_img)) {
                    unlink('./' . $existing_img);
                }

                $img_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('kelola/tautan');
            }
        }

        $data = [
            'nama'       => $this->input->post('nama'),
            'deskripsi'  => $this->input->post('desc'),
            'url'     => $this->input->post('url'),
            'master_tim_id' => $this->input->post('master_tim_id'),
            'img_loc'  => isset($img_name) ? 'uploads/tautan_thumbnail/' . $img_name : $existing_img,
        ];

        $this->Tautan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Tautan updated.');
        redirect('kelola/tautan');
    }

    public function tautan_delete($id)
    {
        $tautan = $this->Tautan_model->getById($id);

        // Delete thumbnail file
        if (!empty($tautan->img_loc) && file_exists('./' . $tautan->img_loc)) {
            unlink('./' . $tautan->img_loc);
        }

        if ($this->Tautan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Tautan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus tautan.');
        }
        redirect('kelola/tautan');
    }

    public function skp()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'kelola';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'kelola'
            );
        }

        $data['title'] = 'Kelola Bukti Dukung SKP';
        $data['desc'] = 'Menu kelola bukti dukung SKP yang dapat diakses oleh admin.';

        $config = array();
        $config["base_url"] = site_url('kelola/skp');
        $config["total_rows"] = $this->Folder_Skp_model->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        // Optional: Bootstrap 4/5 pagination styling
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['skp'] = $this->Folder_Skp_model->get_paginated_and_user($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        $data['tim'] = $this->Tim_model->get_all_tim();
        $data['pegawai'] = $this->User_model->get_all();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('kelola_skp', $data);
        $this->load->view('template/footer');
    }

    public function skp_upload()
    {
        $data = [
            'master_users_id' => $this->input->post('pegawai_id'),
            'url' => $this->input->post('url'),
            'master_tim_id' => $this->input->post('master_tim_id'),
        ];

        if ($this->Folder_Skp_model->insert($data)) {
            $this->session->set_flashdata('success', 'Folder SKP berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan folder SKP.');
        }
        redirect('kelola/skp');
    }

    public function skp_edit($id)
    {
        $data = [
            'master_users_id' => $this->input->post('pegawai_id'),
            'url' => $this->input->post('url'),
            'master_tim_id' => $this->input->post('master_tim_id'),
        ];

        if ($this->Folder_Skp_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Folder SKP berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui folder SKP.');
        }
        redirect('kelola/skp');
    }

    public function skp_delete($id)
    {
        if ($this->Folder_Skp_model->delete($id)) {
            $this->session->set_flashdata('success', 'Folder SKP berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus folder SKP.');
        }
        redirect('kelola/skp');
    }

    public function pengumuman()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'kelola';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'kelola'
            );
        }

        $data['title'] = 'Kelola Pengumuman';
        $data['desc'] = 'Menu kelola pengumuman yang dapat diakses oleh admin.';

        $config = array();
        $config["base_url"] = site_url('kelola/pengumuman');
        $config["total_rows"] = $this->Pengumuman_model->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        // Optional: Bootstrap 4/5 pagination styling
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pengumuman'] = $this->Pengumuman_model->get_paginated($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('kelola_pengumuman', $data);
        $this->load->view('template/footer');
    }

    public function pengumuman_upload()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'active' => $this->input->post('active'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
        ];

        if ($this->Pengumuman_model->insert($data)) {
            $this->session->set_flashdata('success', 'Pengumuman berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan pengumuman.');
        }
        redirect('kelola/pengumuman');
    }

    public function pengumuman_edit($id)
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'active' => $this->input->post('active'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
        ];

        if ($this->Pengumuman_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Pengumuman berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui pengumuman.');
        }
        redirect('kelola/pengumuman');
    }

    public function pengumuman_delete($id)
    {
        if ($this->Pengumuman_model->delete($id)) {
            $this->session->set_flashdata('success', 'Pengumuman berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pengumuman.');
        }
        redirect('kelola/pengumuman');
    }

    public function pengguna()
    {
        $sidebar_data['nama'] = '';
        $sidebar_data['img_loc'] = 'assets/img/bps-sekadau.png';
        $sidebar_data['active_menu'] = 'kelola';

        if ($this->session->userdata('logged_in')) {
            $sidebar_data = array(
                'nama' => $this->session->userdata('nama'),
                'img_loc' => $this->session->userdata('img_loc'),
                'active_menu' => 'kelola'
            );
        }

        $data['title'] = 'Kelola Pengguna';
        $data['desc'] = 'Menu kelola pengguna yang dapat diakses oleh super admin.';

        $config = array();
        $config["base_url"] = site_url('kelola/pengguna');
        $config["total_rows"] = $this->User_model->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        // Optional: Bootstrap 4/5 pagination styling
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pengguna'] = $this->User_model->get_paginated_and_roles($config["per_page"], $page);
        $data['roles'] = $this->Role_model->get_all();
        $data['links'] = $this->pagination->create_links();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $sidebar_data);
        $this->load->view('kelola_pengguna', $data);
        $this->load->view('template/footer');
    }

    public function pengguna_upload()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/foto_pegawai/';
        $config['allowed_types'] = 'webp|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);
        }

        $this->upload->initialize($config);

        if (!empty($_FILES['img']['name'])) {
            if ($this->upload->do_upload('img')) {
                $upload_data = $this->upload->data();
                $img_name = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('kelola/pengguna');
                return;
            }
        } else {
            $img_name = null;
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'email' => $this->input->post('email'),
            'blokir' => 'N',
            'nip' => $this->input->post('nip'),
            'nip_bps' => $this->input->post('nip-bps'),
            'pangkat' => $this->input->post('pangkat'),
            'golongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
            'status' => 1,
            'img_loc' => isset($img_name) ? 'uploads/foto_pegawai/' . $img_name : 'assets/img/pegawai/DEFAULT.webp',
        ];

        $this->db->trans_start();
        if ($this->User_model->insert($data)) {
            // Get the newly created User ID
            $user_id = $this->db->insert_id();

            // Get the selected roles from the checkbox array
            $roles = $this->input->post('roles');

            if (!empty($roles) && is_array($roles)) {
                $role_data = [];
                foreach ($roles as $role_id) {
                    $role_data[] = [
                        'user_id' => $user_id,
                        'role_id' => $role_id
                    ];
                }
                // 4. Batch insert into intermediary table (efficient)
                $this->db->insert_batch('master_users_roles', $role_data);
            }

            $this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan pengguna.');
        }
        $this->db->trans_complete();

        redirect('kelola/pengguna');
    }

    public function pengguna_edit($id)
    {
        $this->load->library('upload');

        $pengguna = $this->User_model->getById($id);
        $existing_img = $pengguna->img_loc;

        // Handle image replacement
        if (!empty($_FILES['img']['name'])) {
            $config['upload_path'] = './uploads/foto_pegawai/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0755, true);
            }

            $this->upload->initialize($config);

            if ($this->upload->do_upload('img')) {
                // delete old file
                $is_not_default = (strpos($existing_img, 'DEFAULT.webp') === false);

                if (!empty($existing_img) && file_exists('./' . $existing_img) && $is_not_default) {
                    unlink('./' . $existing_img);
                }

                $img_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('kelola/pengguna');
            }
        }

        $password_input = $this->input->post('password');
        $password_hashed = !empty($password_input) ? password_hash($password_input, PASSWORD_BCRYPT) : $pengguna->password;
        $blokir = $this->input->post('blokir') ? 'Y' : 'N';
        $status = $this->input->post('aktif') ? 1 : 0;
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $password_hashed,
            'email' => $this->input->post('email'),
            'blokir' => $blokir,
            'nip' => $this->input->post('nip'),
            'nip_bps' => $this->input->post('nip-bps'),
            'pangkat' => $this->input->post('pangkat'),
            'golongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
            'status' => $status,
            'img_loc' => isset($img_name) ? 'uploads/foto_pegawai/' . $img_name : $existing_img,
        ];

        $this->db->trans_start();

        $this->User_model->update($id, $data);

        // Handle role updates
        $roles = $this->input->post('roles');
        // 1. Delete existing roles
        $this->db->where('user_id', $id);
        $this->db->delete('master_users_roles');

        // 2. Insert new roles
        if (!empty($roles) && is_array($roles)) {
            $role_data = [];
            foreach ($roles as $role_id) {
                $role_data[] = [
                    'user_id' => $id,
                    'role_id' => $role_id
                ];
            }
            $this->db->insert_batch('master_users_roles', $role_data);
        }

        $this->db->trans_complete();

        redirect('kelola/pengguna');
    }
}
