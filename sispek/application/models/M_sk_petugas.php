<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sk_petugas extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('t_sk_petugas', $data);
    }

    public function get_by_sk($id_sk)
    {
        return $this->db->get_where('t_sk_petugas', ['id_sk' => $id_sk])->result();
    }
}
