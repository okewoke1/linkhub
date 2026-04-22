<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    public function check_user($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));  // Pastikan untuk menggunakan hashing yang aman
        $query = $this->db->get('t_user');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
}
