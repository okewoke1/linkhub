<?php
class M_daftarkegiatan extends CI_Model
{
    // public function get_filtered_spk($bulan, $tahun, $kelompok_anggaran = null)
    // {
    //     $this->db->select('
    //     t_spkrinci.no_spk, 
    //     t_spkrinci.volume, 
    //     t_spkrinci.nilai_perjanjian, 
    //     t_spk.tanggal_spk, 
    //     t_spk.total_perjanjian, 
    //     t_spk.id_sobat,
    //     t_mitra.nama_mitra, 
    //     t_mitra.id_sobat, 
    //     t_tugas.uraian_tugas, 
    //     t_tugas.kelompok_anggaran,
    //     t_tugas.jabatan,
    //     t_tugas.honor,
    //     t_spk.log
    // ');

    //     $this->db->from('t_spkrinci');
    //     $this->db->join('t_spk', 't_spkrinci.no_spk = t_spk.no_spk', 'left');
    //     $this->db->join('t_mitra', 't_spkrinci.id_sobat = t_mitra.id_sobat', 'left');
    //     $this->db->join('t_tugas', 't_spkrinci.id_tugas = t_tugas.id_tugas', 'left');

    //     if (!empty($bulan)) {
    //         $this->db->where('MONTH(t_spk.tanggal_spk)', $bulan);
    //     }
    //     if (!empty($tahun)) {
    //         $this->db->where('YEAR(t_spk.tanggal_spk)', $tahun);
    //     }
    //     if (!empty($kelompok_anggaran)) {
    //         $this->db->where('t_tugas.kelompok_anggaran', $kelompok_anggaran);
    //     }
    //     // $this->db->order_by('t_spk.tanggal_spk', 'DESC');
        
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    
public function get_filtered_spk($bulan, $tahun, $kelompok_anggaran = null, $id_tugas = null)
{
    $this->db->select('
        t_spkrinci.no_spk, 
        t_spkrinci.volume, 
        t_spkrinci.nilai_perjanjian, 
        t_spk.tanggal_spk, 
        t_spk.total_perjanjian, 
        t_spk.id_sobat,
        t_mitra.nama_mitra, 
        t_mitra.id_sobat, 
        t_tugas.uraian_tugas, 
        t_tugas.kelompok_anggaran,
        t_tugas.jabatan,
        t_tugas.honor,
        t_spk.log
    ');

    $this->db->from('t_spkrinci');
    $this->db->join('t_spk', 't_spkrinci.no_spk = t_spk.no_spk', 'left');
    $this->db->join('t_mitra', 't_spkrinci.id_sobat = t_mitra.id_sobat', 'left');
    $this->db->join('t_tugas', 't_spkrinci.id_tugas = t_tugas.id_tugas', 'left');

    if (!empty($bulan)) {
        $this->db->where('MONTH(t_spk.tanggal_spk)', $bulan);
    }
    if (!empty($tahun)) {
        $this->db->where('YEAR(t_spk.tanggal_spk)', $tahun);
    }
    if (!empty($kelompok_anggaran)) {
        $this->db->where('t_tugas.kelompok_anggaran', $kelompok_anggaran);
    }
    if (!empty($id_tugas)) {
        $this->db->where('t_tugas.id_tugas', $id_tugas);
    }

    return $this->db->get()->result();
}

public function get_kegiatan()
{
    $this->db->select('id_tugas, uraian_tugas');
    $this->db->from('t_tugas');
    $this->db->order_by('uraian_tugas', 'ASC');
    return $this->db->get()->result();
}

    // Di dalam model M_daftarspk.php
    public function get_kelompok_anggaran()
    {
        $this->db->distinct(); // Mengambil nilai unik
        $this->db->select('kelompok_anggaran');
        $this->db->from('t_tugas'); // Pastikan tabel ini sesuai
        $query = $this->db->get();

        return $query->result(); // Mengembalikan hasil query
    }
    
public function get_kegiatan_by_filter($tahun, $kelompok_anggaran)
{
    $this->db->select('id_tugas, uraian_tugas, jabatan');
    $this->db->from('t_tugas');

    if (!empty($tahun)) {
        $this->db->where('tahun', $tahun);
    }

    if (!empty($kelompok_anggaran)) {
        $this->db->where('kelompok_anggaran', $kelompok_anggaran);
    }

    $this->db->order_by('jabatan', 'ASC');
    $this->db->order_by('uraian_tugas', 'ASC');

    return $this->db->get()->result();
}



}
