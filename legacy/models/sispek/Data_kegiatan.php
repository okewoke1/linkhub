<?php

class Data_kegiatan extends CI_Model
{
    public function tampil_data()
    {
        // Select fields from both t_tugas and t_anggaran
        $this->db->select('t_tugas.id_tugas, t_tugas.jabatan, t_tugas.uraian_tugas, t_tugas.satuan, t_tugas.honor, t_anggaran.kode_anggaran, t_anggaran.kelompok_anggaran, t_anggaran.bidang_teknis');
        $this->db->from('t_tugas');

        // Perform the join between t_tugas and t_anggaran on kelompok_anggaran and kode_anggaran
        $this->db->join('t_anggaran', 't_tugas.kode_anggaran = t_anggaran.kode_anggaran AND t_tugas.kelompok_anggaran = t_anggaran.kelompok_anggaran', 'left');

        // Return the result
        return $this->db->get();
    }


    public function input_data($data)
    {
        $this->db->insert('t_tugas', $data);
    }
    public function hapus_data($data)
    {
        $this->db->delete('t_tugas', $data);
    }
    public function edit_data($data)
    {
        return $this->db->get_where('t_tugas', $data);
    }
    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('t_tugas', $data);
    }

    public function list_anggaran()
    {
        $this->db->order_by('kelompok_anggaran', 'ASC');
        return $this->db->get('t_anggaran')->result();
    }

    public function auto_kode_anggaran($kelompok_anggaran)
    {
        $this->db->where('kelompok_anggaran', $kelompok_anggaran);
        $query = $this->db->get('t_anggaran');
        return $query->result();
    }
}
