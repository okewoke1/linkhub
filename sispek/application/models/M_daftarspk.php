<?php
class M_daftarspk extends CI_Model
{
    public function get_all_spk()
    {
        $this->db->select('t_spk.*, t_mitra.*, t_ppk.*, 
        (SELECT SUM(nilai_perjanjian) FROM t_spkrinci WHERE t_spkrinci.no_spk = t_spk.no_spk) as total_rinci');
        $this->db->from('t_spk');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');

        $query = $this->db->get();
        return $query->result();
    }
// public function get_all_spk()
// {
//     $this->db->select("
//         t_spk.no_spk,
//         t_spk.tanggal_spk,
//         t_spk.total_perjanjian,
//         t_spk.id_sobat,
//         t_spk.nip_ppk,
//         t_mitra.nama_mitra,
//         t_ppk.ppk,
//         (
//             SELECT SUM(r.nilai_perjanjian)
//             FROM t_spkrinci r
//             WHERE r.no_spk = t_spk.no_spk
//         ) AS total_rinci
//     ");

//     $this->db->from('t_spk');

//     // JOIN MITRA SESUAI TAHUN SPK
//     $this->db->join(
//         't_mitra',
//         't_spk.id_sobat = t_mitra.id_sobat 
//          AND t_mitra.tahun_kepka = YEAR(t_spk.tanggal_spk)',
//         'left'
//     );

//     // JOIN PPK
//     $this->db->join(
//         't_ppk',
//         't_spk.nip_ppk = t_ppk.nip',
//         'left'
//     );

//     // SORT: TANGGAL TERBARU + NO SPK
//     $this->db->order_by('t_spk.tanggal_spk', 'DESC');
//     $this->db->order_by('t_spk.no_spk', 'DESC');

//     return $this->db->get()->result();
// }







    public function detail_spk($no_spk)
    {
        // Memangkas $no_spk menjadi 4 angka dari kiri
        $spk_string = substr($no_spk, 0, 4);

        $this->db->from('t_spk');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
        $this->db->where('t_spk.no_spk LIKE', $spk_string . '%');

        $query = $this->db->get();
        return $query->result();
    }
    
// public function detail_spk($no_spk)
// {
//     $spk_string = substr($no_spk, 0, 4);

//     $this->db->from('t_spk');

//     $this->db->join(
//         't_mitra',
//         't_spk.id_mitra = t_mitra.id_mitra
//          AND t_mitra.tahun_kepka = YEAR(t_spk.tanggal_spk)',
//         'left'
//     );

//     $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
//     $this->db->where('t_spk.no_spk LIKE', $spk_string . '%');

//     return $this->db->get()->result();
// }



    public function tabel_detail_spk($no_spk)
    {

        // Memangkas $no_spk menjadi 4 angka dari kiri
        $no_spk_trimmed = substr($no_spk, 0, 4);

        // Join tabel SPK dengan tabel SPK Rinci dan Mitra
        $this->db->select('*');
        $this->db->from('t_spkrinci');
        $this->db->join('t_tugas', 't_tugas.id_tugas = t_spkrinci.id_tugas');
        $this->db->where('t_spkrinci.no_spk LIKE', $no_spk_trimmed . '%'); // Menggunakan LIKE dengan $no_spk_trimmed
        $query = $this->db->get();
        return $query->result();
    }

    public function cetak_detail_spk($no_spk)
    {
        // Memangkas $no_spk menjadi 4 angka dari kiri
        $spk_string = substr($no_spk, 0, 4);
        $bulan = substr($no_spk, 8, 2);
        $tahun = substr($no_spk, -4);

        $spk_number = $spk_string . "/6109-SPK/PPIS/{$bulan}/{$tahun}";

        $this->db->from('t_spk');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
        $this->db->where('t_spk.no_spk LIKE', $spk_number . '%');

        $query = $this->db->get();
        return $query->result();
    }

    public function cetak_tabel_detail_spk($no_spk)
    {

        // Memangkas $no_spk menjadi 4 angka dari kiri
        $no_spk_trimmed = substr($no_spk, 0, 4);
        $bulan = substr($no_spk, 8, 2);
        $tahun = substr($no_spk, -4);

        $spk_number = $no_spk_trimmed . "/6109-SPK/PPIS/{$bulan}/{$tahun}";

        // Join tabel SPK dengan tabel SPK Rinci dan Mitra
        $this->db->select('*');
        $this->db->from('t_spkrinci');
        $this->db->join('t_tugas', 't_tugas.id_tugas = t_spkrinci.id_tugas');
        $this->db->where('t_spkrinci.no_spk LIKE', $spk_number . '%'); // Menggunakan LIKE dengan $no_spk_trimmed
        $query = $this->db->get();
        return $query->result();
    }

    public function hapus_data_spk($no_spk)
    {
        // Hapus data dari tabel t_spkrinci
        $this->db->where('no_spk', $no_spk);
        $this->db->delete('t_spkrinci');

        // Hapus data dari tabel t_spk
        $this->db->where('no_spk', $no_spk);
        $this->db->delete('t_spk');

        // Pastikan minimal satu baris terpengaruh dari setiap tabel
        return $this->db->affected_rows() > 0;
    }

    public function get_filtered_spk($bulan, $tahun)
    {
        $this->db->select('t_spk.*, t_mitra.*, t_ppk.*, 
        (SELECT SUM(nilai_perjanjian) FROM t_spkrinci WHERE t_spkrinci.no_spk = t_spk.no_spk) as total_rinci');
        $this->db->from('t_spk');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
        

        // Apply filtering
        if (!empty($bulan)) {
            $this->db->where('MONTH(t_spk.tanggal_spk)', $bulan);
        }
        if (!empty($tahun)) {
            $this->db->where('YEAR(t_spk.tanggal_spk)', $tahun);
        }
        
        // $this->db->order_by('t_spk.tanggal_spk', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
public function update_materai($no_spk, $data)
{
    $this->db->where('no_spk', $no_spk);
    return $this->db->update('t_spk', $data);
}




}
