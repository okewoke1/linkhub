<?php

class Folder_Skp_model extends CI_Model
{
    public function get_all_folders_and_users_and_tim()
    {
        $this->db->select('
        l_folder_skp.*,
        master_users.img_loc as img_loc,
        master_users.nama as nama,
        master_tim.nama as tim_nama,
        ');
        $this->db->from('l_folder_skp');
        $this->db->join('master_users', 'master_users.id = l_folder_skp.master_users_id', 'left');
        $this->db->join('master_tim', 'master_tim.id = l_folder_skp.master_tim_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_folder_and_user_and_tim($user_id)
    {
        $this->db->select('
        l_folder_skp.*,
        master_users.img_loc as img_loc,
        master_users.nama as nama,
        master_tim.nama as tim_nama,
        ');
        $this->db->from('l_folder_skp');
        $this->db->join('master_users', 'master_users.id = l_folder_skp.master_users_id', 'left');
        $this->db->join('master_tim', 'master_tim.id = l_folder_skp.master_tim_id', 'left');

        $this->db->where('l_folder_skp.master_users_id', $user_id);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_url_ckp_wfh($user_id)
    {
        $this->db->select('l_folder_skp.url_ckp_wfh');
        $this->db->from('l_folder_skp');
        $this->db->where('l_folder_skp.master_users_id', $user_id);
        $query = $this->db->get();
        return $query->row() ? $query->row()->url_ckp_wfh : null;
    }

    public function count_all()
    {
        return $this->db->count_all('l_folder_skp');
    }

    public function get_paginated_and_user($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('
        l_folder_skp.*,
        master_users.nama as nama,
        master_users.jabatan as jabatan,
        master_users.id as user_id,
        ');
        $this->db->from('l_folder_skp');
        $this->db->join('master_users', 'master_users.id = l_folder_skp.master_users_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        return $this->db->insert('l_folder_skp', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('l_folder_skp', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('l_folder_skp', array('id' => $id));
    }
}
