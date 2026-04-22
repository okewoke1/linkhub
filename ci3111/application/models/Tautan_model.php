<?php

class Tautan_model extends CI_Model
{
    public function get_all_tautan()
    {
        $this->db->select('*');
        $this->db->from('l_tautan');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('l_tautan');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function count_all()
    {
        return $this->db->count_all('l_tautan');
    }

    public function get_paginated($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('l_tautan');
        return $query->result();
    }

    public function insert($data)
    {
        return $this->db->insert('l_tautan', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('l_tautan', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('l_tautan', array('id' => $id));
    }

    public function get_tautan_administrasi()
    {
        $this->db->select('*');
        $this->db->where('master_tim_id', 1);
        $this->db->from('l_tautan');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tautan_umum()
    {
        $this->db->select('*');
        $this->db->where('master_tim_id', 7);
        $this->db->from('l_tautan');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tautan_teknis_and_tim()
    {
        $this->db->select('l_tautan.*, master_tim.id as tim_id');
        $this->db->from('l_tautan');
        $this->db->join('master_tim', 'master_tim.id = l_tautan.master_tim_id', 'left');
        $this->db->where_in('master_tim.id', [2, 3, 4, 5, 6]);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tautan_teknis($tim_id)
    {
        $this->db->select('*');
        $this->db->where('master_tim_id', $tim_id);
        $this->db->from('l_tautan');
        $query = $this->db->get();
        return $query->result();
    }
}
