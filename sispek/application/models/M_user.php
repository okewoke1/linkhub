<?php

class M_user extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('t_user');
    }

    public function get_usernames()
    {
        // Ambil username dari session
        $username = $this->session->userdata('username');

        // $this->db->select('username');
        $this->db->where('username', $username);
        return $this->db->get('t_user');
    }
    
    public function input_data($data)
    {
        $this->db->insert('t_user', $data);
    }

    public function hapus_data($data)
    {
        $this->db->delete('t_user', $data);
    }

    public function cek_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('t_user');
        return $query->row_array(); // Mengembalikan data jika ditemukan, atau NULL jika tidak
    }

    public function cek_user($user)
    {
        $this->db->where('username', $user);
        $query = $this->db->get('t_user');
        return $query->row_array(); // Mengembalikan data jika ditemukan, atau NULL jika tidak
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('t_user', $data);
    }
    public function update_pw($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('t_user', $data);
    }
}
