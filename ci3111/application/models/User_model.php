<?php

class User_model extends CI_Model
{
    public function get_user_by_email_and_password($email, $password)
    {
        // Fetch user by email
        $this->db->where('email', $email);
        $user = $this->db->get('master_users')->row();

        if ($user && password_verify($password, $user->password)) {
            log_message('debug', 'Password verified successfully');
            log_message('debug', 'coba: ' . print_r($this->session->userdata(), true));
            return $user;
        }

        return null;
    }

    public function get_user_roles($user_id)
    {
        $this->db->select('r.name');
        $this->db->from('master_roles r');
        $this->db->join('master_users_roles ur', 'ur.role_id = r.id');
        $this->db->where('ur.user_id', $user_id);
        $query = $this->db->get();

        $roles = array();
        foreach ($query->result() as $row) {
            $roles[] = $row->name;
        }
        return $roles; // Returns an array like ['AppA_Admin', 'AppB_Viewer']
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('master_users');
        $query = $this->db->get();
        return $query->result();
    }
}
