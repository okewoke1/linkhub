<?php

class Role_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('master_roles');
        $query = $this->db->get();
        return $query->result();
    }
}
