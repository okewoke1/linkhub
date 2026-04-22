<?php

class M_mitra extends CI_Model
{
    public function tampil_data()
    {
        // Urutkan hasil pengambilan data berdasarkan nama_mitra secara alfabetis (A-Z)
        $this->db->order_by('nama_mitra', 'ASC');

        // Lakukan pengambilan data dari tabel t_mitra
        return $this->db->get('t_mitra');
    }
    public function input_data($data)
    {
        $this->db->insert('t_mitra', $data);
    }
    public function hapus_data($data)
    {
        $this->db->delete('t_mitra', $data);
    }
    public function edit_data($data)
    {
        return $this->db->get_where('t_mitra', $data);
    }
    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('t_mitra', $data);
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('t_mitra', $data);
    }

    public function get_by_id_sobat($id_sobat)
    {
        $this->db->where('id_sobat', $id_sobat);
        $query = $this->db->get('t_mitra');
        return $query->row(); // Mengembalikan satu baris sebagai objek
    }
}
