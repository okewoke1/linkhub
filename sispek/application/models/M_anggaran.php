<?php

class M_anggaran extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('t_anggaran');
    }
    public function input_data($data)
    {
        $this->db->insert('t_anggaran', $data);
    }

    public function cek_kode_anggaran($kode_anggaran)
    {
        $this->db->where('kode_anggaran', $kode_anggaran);
        $query = $this->db->get('t_anggaran');
        return $query->row_array(); // Mengembalikan data jika ditemukan, atau NULL jika tidak
    }

    public function cek_kelompok_anggaran($kelompok_anggaran)
    {
        $this->db->where('kelompok_anggaran', $kelompok_anggaran);
        $query = $this->db->get('t_anggaran');
        return $query->row_array(); // Mengembalikan data jika ditemukan, atau NULL jika tidak
    }

    public function hapus_data($data)
    {
        $this->db->delete('t_anggaran', $data);
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('t_anggaran', $data);
    }
}
