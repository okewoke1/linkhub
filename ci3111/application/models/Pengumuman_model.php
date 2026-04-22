<?php

class Pengumuman_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('l_pengumuman');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        return $this->db->count_all('l_pengumuman');
    }

    public function get_paginated($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('l_pengumuman');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        return $this->db->insert('l_pengumuman', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('l_pengumuman', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('l_pengumuman', array('id' => $id));
    }

    public function get_active_pengumuman()
    {
        $today = date('Y-m-d');
        return $this->db->where('active', 1)
            ->where('start_date <=', $today)
            ->where('end_date >=', $today)
            ->get('l_pengumuman')
            ->result();
    }
}
