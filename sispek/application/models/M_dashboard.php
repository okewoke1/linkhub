<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function get_total_perjanjian($start_date, $end_date)
    {
        $this->db->select_sum('total_perjanjian');
        $this->db->from('t_spk');
        $this->db->where('tanggal_spk >=', $start_date);
        $this->db->where('tanggal_spk <=', $end_date);
        $query = $this->db->get();
        return $query->row()->total_perjanjian;
    }
    
    // public function get_total_perjanjian($start_date, $end_date)
    // {
    //     $this->db->select('SUM(total_perjanjian) AS total');
    //     $this->db->from('t_spk');
    //     $this->db->where('tanggal_spk >=', $start_date);
    //     $this->db->where('tanggal_spk <=', $end_date);
    
    //     $query = $this->db->get()->row();
    //     return $query ? $query->total : 0;
    // }

    public function get_total_perjanjian_tahun($year)
    {
        // Hitung tanggal awal dan akhir tahun
        $start_of_year = $year . '-01-01';
        $end_of_year = $year . '-12-31';
    
        // Query untuk menjumlahkan total perjanjian selama setahun
        $this->db->select_sum('total_perjanjian');
        $this->db->from('t_spk');
        $this->db->where('tanggal_spk >=', $start_of_year);
        $this->db->where('tanggal_spk <=', $end_of_year);
    
        $query = $this->db->get();
    
        // Kembalikan hasil total perjanjian
        return $query->row()->total_perjanjian;
    }


    public function get_spk_count($start_date, $end_date)
    {
        $this->db->from('t_spk');
        $this->db->where('tanggal_spk >=', $start_date);
        $this->db->where('tanggal_spk <=', $end_date);
        return $this->db->count_all_results();
    }
    
    public function get_all_spk()
    {
        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Build the query
        $this->db->select('t_spk.*, t_mitra.*, t_ppk.*, 
        (SELECT SUM(nilai_perjanjian) FROM t_spkrinci WHERE t_spkrinci.no_spk = t_spk.no_spk) as total_rinci');
        $this->db->from('t_spk');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
        $this->db->where('MONTH(t_spk.tanggal_spk)', $currentMonth);
        $this->db->where('YEAR(t_spk.tanggal_spk)', $currentYear);
        $this->db->order_by('total_rinci', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }
    
    // public function get_all_spk()
    // {
    //     $currentMonth = date('m');
    //     $currentYear  = date('Y');
    
    //     $this->db->select('
    //         t_spk.*,
    //         t_mitra.nama_mitra,
    //         t_mitra.id_mitra,
    //         t_ppk.*,
    //         (SELECT SUM(nilai_perjanjian)
    //          FROM t_spkrinci 
    //          WHERE t_spkrinci.no_spk = t_spk.no_spk) as total_rinci
    //     ');
    //     $this->db->from('t_spk');
    
    //     $this->db->join(
    //         't_mitra',
    //         't_spk.id_sobat = t_mitra.id_sobat 
    //          AND YEAR(t_spk.tanggal_spk) = t_mitra.tahun_kepka',
    //         'left'
    //     );
    
    //     $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
    //     $this->db->where('MONTH(t_spk.tanggal_spk)', $currentMonth);
    //     $this->db->where('YEAR(t_spk.tanggal_spk)', $currentYear);
    //     $this->db->order_by('total_rinci', 'DESC');
    
    //     return $this->db->get()->result();
    // }


    public function get_all_spk_bulan_sebelumnya()
    {
        // Get the previous month and year
        $previousMonth = date('m', strtotime('first day of last month'));
        $previousYear = date('Y', strtotime('first day of last month'));

        // Build the query
        $this->db->select('t_spk.*, t_mitra.*, t_ppk.*, 
        (SELECT SUM(nilai_perjanjian) FROM t_spkrinci WHERE t_spkrinci.no_spk = t_spk.no_spk) as total_rinci');
        $this->db->from('t_spk');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
        $this->db->where('MONTH(t_spk.tanggal_spk)', $previousMonth);
        $this->db->where('YEAR(t_spk.tanggal_spk)', $previousYear);
        $this->db->order_by('total_rinci', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }
    
    // public function get_all_spk_bulan_sebelumnya()
    // {
    //     $previousMonth = date('m', strtotime('first day of last month'));
    //     $previousYear  = date('Y', strtotime('first day of last month'));
    
    //     $this->db->select("
    //         t_spk.*,
    //         t_mitra.nama_mitra,
    //         t_mitra.id_mitra,
    //         t_ppk.*,
    //         (
    //             SELECT SUM(nilai_perjanjian)
    //             FROM t_spkrinci
    //             WHERE t_spkrinci.no_spk = t_spk.no_spk
    //         ) AS total_rinci
    //     ", false); // false = supaya subquery tidak di-escape
    
    //     $this->db->from('t_spk');
    
    //     // ? JOIN MITRA PALING AMAN
    //     $this->db->join(
    //         't_mitra',
    //         "t_spk.id_sobat = t_mitra.id_sobat
    //          AND t_mitra.tahun_kepka = (
    //              SELECT MAX(tm.tahun_kepka)
    //              FROM t_mitra tm
    //              WHERE tm.id_sobat = t_spk.id_sobat
    //          )",
    //         'left',
    //         false
    //     );
    
    //     $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
    
    //     $this->db->where('MONTH(t_spk.tanggal_spk)', $previousMonth);
    //     $this->db->where('YEAR(t_spk.tanggal_spk)', $previousYear);
    
    //     $this->db->order_by('total_rinci', 'DESC');
    
    //     return $this->db->get()->result();
    // }


    
    public function get_all_spk_tahun_ini($year)
    {
       // Hitung tanggal awal dan akhir tahun
    $start_of_year = $year . '-01-01';
    $end_of_year = $year . '-12-31';

    // Query untuk menghitung jumlah SPK
    $this->db->from('t_spk');
    $this->db->where('tanggal_spk >=', $start_of_year);
    $this->db->where('tanggal_spk <=', $end_of_year);

    return $this->db->count_all_results(); // Kembalikan jumlah SPK
    }
    
    public function get_all_spk_bulan_berikutnya()
    {
        // Get the next month and year
        $nextMonth = date('m', strtotime('first day of next month'));
        $nextYear = date('Y', strtotime('first day of next month'));

        // Build the query
        $this->db->select('t_spk.*, t_mitra.*, t_ppk.*, 
        (SELECT SUM(nilai_perjanjian) FROM t_spkrinci WHERE t_spkrinci.no_spk = t_spk.no_spk) as total_rinci');
        $this->db->from('t_spk');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
        $this->db->where('MONTH(t_spk.tanggal_spk)', $nextMonth);
        $this->db->where('YEAR(t_spk.tanggal_spk)', $nextYear);
        $this->db->order_by('total_rinci', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }

     // Method untuk mendapatkan SPK dan rincian tugas berdasarkan id_sobat, bulan, dan tahun
    public function get_mitra_spk($no_spk_list)
    {
        if (!is_array($no_spk_list) || empty($no_spk_list)) {
            return [];
        }

        $this->db->select('t_spk.*, t_spkrinci.*, t_tugas.uraian_tugas, t_tugas.satuan');
        $this->db->from('t_spk');
        $this->db->join('t_spkrinci', 't_spk.no_spk = t_spkrinci.no_spk');
        $this->db->join('t_tugas', 't_spkrinci.id_tugas = t_tugas.id_tugas');
        $this->db->where_in('t_spk.no_spk', $no_spk_list);
        $this->db->order_by('t_spk.tanggal_spk', 'DESC');

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
    
public function count_materai_bulan_ini_detail()
{
    return $this->db->query("
        SELECT
            SUM(CASE WHEN materai = 0 THEN 1 ELSE 0 END) AS belum,
            SUM(CASE WHEN materai = 1 THEN 1 ELSE 0 END) AS menunggu,
            SUM(CASE WHEN materai = 2 THEN 1 ELSE 0 END) AS terkonfirmasi
        FROM t_spk
        WHERE MONTH(tanggal_spk) = MONTH(CURDATE())
          AND YEAR(tanggal_spk) = YEAR(CURDATE())
    ")->row();
}

public function count_materai_bulan_lalu_detail()
{
    return $this->db->query("
        SELECT
            SUM(CASE WHEN materai = 0 THEN 1 ELSE 0 END) AS belum,
            SUM(CASE WHEN materai = 1 THEN 1 ELSE 0 END) AS menunggu,
            SUM(CASE WHEN materai = 2 THEN 1 ELSE 0 END) AS terkonfirmasi
        FROM t_spk
        WHERE MONTH(tanggal_spk) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
          AND YEAR(tanggal_spk)  = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
    ")->row();
}


}
