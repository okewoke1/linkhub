<?php

class M_ppk extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('t_ppk');
    }

    public function input_data($data)
    {
        $this->db->insert('t_ppk', $data);
    }

    public function hapus_data($data)
    {
        $this->db->delete('t_ppk', $data);
    }

    public function cek_nip($nip)
    {
        $this->db->where('nip', $nip);
        $query = $this->db->get('t_ppk');
        return $query->row_array(); // Mengembalikan data jika ditemukan, atau NULL jika tidak
    }

    public function cek_ppk($ppk)
    {
        $this->db->where('ppk', $ppk);
        $query = $this->db->get('t_ppk');
        return $query->row_array(); // Mengembalikan data jika ditemukan, atau NULL jika tidak
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('t_ppk', $data);
    }
}
