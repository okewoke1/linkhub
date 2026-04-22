<?php
class M_daftarbast extends CI_Model
{
    public function get_filtered_bast($bulan, $tahun)
    {
        $this->db->select('t_bast.*, t_spk.*, t_mitra.*, t_ppk.*' );
        $this->db->from('t_bast');
        $this->db->join('t_spk', 't_bast.no_spk = t_spk.no_spk', 'left');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
        $this->db->group_by('t_bast.no_bast'); // Mengelompokkan berdasarkan nomor BAST

        // Apply filtering
        if (!empty($bulan)) {
            $this->db->where('MONTH(t_bast.tanggal_bast)', $bulan);
        }
        if (!empty($tahun)) {
            $this->db->where('YEAR(t_bast.tanggal_bast)', $tahun);
        }
        
        $this->db->order_by('t_bast.tanggal_bast', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function cetak_detail_bast($no_bast, $tanggal_bast)
    // public function cetak_detail_bast($no_bast)
    {
        // Memangkas $no_bast menjadi 4 angka dari kiri
        $bast_string = substr($no_bast, 0, 4);
        $bulan = date('m', strtotime($tanggal_bast));
        $tahun = date('Y', strtotime($tanggal_bast));
        $bast_number = $bast_string . "/6109-BAST/PPIS/{$bulan}/{$tahun}";
        
        // $formattedTanggalBast = date('Y-m-d', strtotime($tanggal_bast));

        $this->db->from('t_bast');
        $this->db->join('t_spk', 't_bast.no_spk = t_spk.no_spk', 'left');
        $this->db->join('t_mitra', 't_spk.id_sobat = t_mitra.id_sobat', 'left');
        $this->db->join('t_ppk', 't_spk.nip_ppk = t_ppk.nip', 'left');
        $this->db->join('t_spkrinci', 't_bast.no_spk = t_spkrinci.no_spk', 'left');
        $this->db->join('t_tugas', 't_spkrinci.id_tugas = t_tugas.id_tugas', 'left');
        $this->db->where('t_bast.no_bast LIKE', $bast_number . '%');
        $this->db->group_by('t_bast.no_bast'); // Mengelompokkan berdasarkan nomor BAST
        
        // Menggunakan $no_bast langsung dalam where clause
        // $this->db->where('t_bast.tanggal_spk', $formattedTanggalBast);
        // $this->db->where('t_bast.no_bast LIKE', $no_bast . '%');

        $query = $this->db->get();
        return $query->result();
    }


    public function cari_bast($no_spk)
    {
        $this->db->from('t_bast');
        $this->db->where('no_spk', $no_spk);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();  // Jika ditemukan, kembalikan data BAST
        } else {
            return false;  // Jika tidak ditemukan, return false
        }
    }
    
    public function get_bast_by_no_spk($no_spk) {
        // Ambil data dari t_bast dan join dengan t_spk untuk mendapatkan tanggal_spk
        $this->db->select('t_bast.no_bast, t_bast.tanggal_bast, t_spk.tanggal_spk');
        $this->db->from('t_bast');
        $this->db->join('t_spk', 't_bast.no_spk = t_spk.no_spk', 'left'); // Join dengan t_spk
        $this->db->where('t_bast.no_spk', $no_spk);
        
        $query = $this->db->get();
        return $query->row(); // Mengembalikan satu baris hasil
        
    }

    // Fungsi untuk menyimpan data BAST ke dalam tabel 't_bast'
    public function simpan_bast($no_bast, $tanggal_bast, $no_spk)
    {
        // Siapkan data untuk disimpan
        $data = array(
            'no_bast' => $no_bast,
            'tanggal_bast' => $tanggal_bast,
            'no_spk' => $no_spk
        );

        // Insert data ke tabel 't_bast'
        $this->db->insert('t_bast', $data);

        // Mengembalikan true jika data berhasil disimpan
        return ($this->db->affected_rows() > 0);
    }

    public function hapus_bast($no_bast) {
        
        // Hapus data dari tabel BAST berdasarkan no_bast
        $this->db->where('no_bast', $no_bast);
        return $this->db->delete('t_bast'); // Mengembalikan true jika berhasil
    }
}
