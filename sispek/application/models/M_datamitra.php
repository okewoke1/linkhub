<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datamitra extends CI_Model
{
    // Method untuk mendapatkan detail mitra berdasarkan id_sobat
    public function get_mitra_detail($id_sobat)
    {
        return $this->db->get_where('t_mitra', ['id_sobat' => $id_sobat])->row_array();
    }

    // Method untuk mendapatkan SPK dan rincian tugas berdasarkan id_sobat, bulan, dan tahun
   public function get_mitra_spk($id_sobat, $bulan = null, $tahun = null)
    {
        $this->db->select('t_spk.*, t_spkrinci.*, t_tugas.uraian_tugas, t_tugas.satuan');
        $this->db->from('t_spk');
        $this->db->join('t_spkrinci', 't_spk.no_spk = t_spkrinci.no_spk');
        $this->db->join('t_tugas', 't_spkrinci.id_tugas = t_tugas.id_tugas');
        $this->db->where('t_spk.id_sobat', $id_sobat);
    
        // Filter berdasarkan bulan dan tahun (jika diberikan)
        if ($bulan) {
            $this->db->where('MONTH(t_spk.tanggal_spk)', $bulan);
        }
        if ($tahun) {
            $this->db->where('YEAR(t_spk.tanggal_spk)', $tahun);
        }
    
        // Mengurutkan berdasarkan tahun dan bulan
        $this->db->order_by('YEAR(t_spk.tanggal_spk)', 'ASC');
        $this->db->order_by('MONTH(t_spk.tanggal_spk)', 'ASC');
    
        $query = $this->db->get();
        $spk_data = [];
        foreach ($query->result_array() as $row) {
            $spk_data[$row['no_spk']]['no_spk'] = $row['no_spk'];
            $spk_data[$row['no_spk']]['tanggal_spk'] = $row['tanggal_spk'];
            $spk_data[$row['no_spk']]['total_perjanjian'] = $row['total_perjanjian'];
            $spk_data[$row['no_spk']]['rincian_tugas'][] = [
                'uraian_tugas' => $row['uraian_tugas'],
                'volume' => $row['volume'],
                'satuan' => $row['satuan'],
                'nilai_perjanjian' => $row['nilai_perjanjian'],
            ];
        }
    
        return $spk_data;
    }
}
