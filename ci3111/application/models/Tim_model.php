<?php

class Tim_model extends CI_Model {
    public function get_all_tim() {
        $this->db->select('*');
        $this->db->from('master_tim');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tim_teknis() {
        $this->db->select('*');
        $this->db->from('master_tim');
        $this->db->where_in('id', [2, 3, 4, 5, 6]);
        $query = $this->db->get();
        return $query->result();
    }
}
