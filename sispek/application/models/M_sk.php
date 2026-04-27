<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sk extends CI_Model {

    public function get_all()
    {
        return $this->db->get('t_sk')->result();
    }

    public function insert($data)
    {
        $this->db->insert('t_sk', $data);
        return $this->db->insert_id();
    }

    public function insert_tugas($id_sk, $id_tugas)
    {
        return $this->db->insert('t_sk_tugas', [
            'id_sk'    => $id_sk,
            'id_tugas' => $id_tugas
        ]);
    }

    public function get_master_tugas($tahun = null, $kelompok_anggaran = null)
    {
        if ($tahun) {
            $this->db->where('tahun', $tahun);
        }
    
        if ($kelompok_anggaran) {
            $this->db->where('kelompok_anggaran', $kelompok_anggaran);
        }
    
        return $this->db->get('t_tugas')->result();
    }
    
public function get_kelompok_by_tahun($tahun)
{
    return $this->db->distinct()
                    ->select('kelompok_anggaran')
                    ->where('tahun', $tahun)
                    ->get('t_tugas')
                    ->result();
}

    
    public function get_tugas_filtered($tahun, $kelompok)
    {
        return $this->db->where('tahun', $tahun)
                        ->where('kelompok_anggaran', $kelompok)
                        ->get('t_tugas')
                        ->result();
    }


}
