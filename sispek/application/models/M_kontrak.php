<?php

class M_kontrak extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function search_mitra($query)
    {
        $this->db->like('nama_mitra', $query); // Gunakan 'like' untuk pencocokan parsial
        $this->db->order_by('nama_mitra', 'ASC');
        return $this->db->get('t_mitra')->result(); // Kembalikan hasil
    }
    // public function search_mitra($query, $tahun_kepka)
    // {
    //     $this->db->like('nama_mitra', $query);
    //     $this->db->where('tahun_kepka', $tahun_kepka);
    //     $this->db->order_by('nama_mitra', 'ASC');
    
    //     return $this->db->get('t_mitra')->result();
    // }


    // FUNGSI LIST MITRA / TUGAS / PKK UNTUK MENGAMBIL LIST OPTION MENU
    public function list_mitra()
    {
        $this->db->order_by('nama_mitra', 'ASC');
        return $this->db->get('t_mitra')->result();
    }
    
    /// LIST TUGAS
    public function list_tugas()
    {
        $this->db->order_by('kode_anggaran', 'ASC');
        return $this->db->get('t_tugas')->result();
    }

    // public function get_data_tugas_by_kelompok_anggaran($kelompok_anggaran)
    // {
    //     $this->db->where('kelompok_anggaran', $kelompok_anggaran);
    //     $this->db->order_by('id_tugas', 'DESC'); // Mengurutkan dari terbaru ke terlama
    //     $query = $this->db->get('t_tugas');
    //     return $query->result();
    // }
    
    public function get_data_tugas_by_kelompok_anggaran($kelompok_anggaran, $tahun)
    {
        $this->db->where('kelompok_anggaran', $kelompok_anggaran);
        $this->db->where('tahun', $tahun);
        $this->db->order_by('id_tugas', 'DESC');
    
        $query = $this->db->get('t_tugas');
        return $query->result();
    }

    public function get_all_kelompok_anggaran()
    {
        $this->db->distinct();
        $this->db->select('kelompok_anggaran');
        $query = $this->db->get('t_anggaran');
        return $query->result();
    }


    // public function get_data_tugas($jenis_kegiatan)
    // {
    //     $this->db->order_by('kode_anggaran', 'ASC');
    //     $this->db->like('uraian_tugas', $jenis_kegiatan); // Fixed the column name in the like method
    //     $query = $this->db->get('t_tugas'); // Ensure the table name is specified
    //     return $query->result();
    // }

    ///LIST TUGAS 
    public function list_ppk()
    {
        $this->db->order_by('ppk', 'ASC');
        return $this->db->get('t_ppk')->result();
    }

    public function get_existing_data($t_spk, $id_tugas)
    {
        // Query untuk mendapatkan data dengan t_spk dan id_tugas tertentu
        $this->db->where('no_spk', $t_spk);
        $this->db->where('id_tugas', $id_tugas);
        $query = $this->db->get('t_spkrinci');

        // Mengembalikan hasil query jika ada, atau NULL jika tidak ada
        return $query->row();
    }

    public function simpan_data($t_spk, $t_idmitra, $id_tugas, $volume, $jumlah)
    {
        if (isset($existing_data)) {
            // Jika sudah ada, tambahkan volume dan jumlah baru ke volume dan jumlah yang sudah ada
            $existing_volume = $existing_data->volume;
            $existing_jumlah = $existing_data->nilai_perjanjian;

            $volume += $existing_volume;
            $jumlah += $existing_jumlah;

            // Perbarui data yang sudah ada di database
            $data = array(
                'volume' => $volume,
                'nilai_perjanjian' => $jumlah
            );
            $this->db->where('no_spk', $t_spk);
            $this->db->where('id_tugas', $id_tugas);
            $this->db->update('t_spkrinci', $data);
        } else {
            // Jika belum ada, tambahkan data baru ke database
            $data = array(
                'no_spk' => $t_spk,
                'id_sobat' => $t_idmitra,
                'id_tugas' => $id_tugas,
                'volume' => $volume,
                'nilai_perjanjian' => $jumlah
            );
            $this->db->insert('t_spkrinci', $data);
        }
    }

    public function input_table($data)
    {
        $this->db->insert('t_spkrinci', $data);
    }

    // FUNGSI AUTO COMPLETE / TUGAS / PKK UNTUK OTOMATIS MENGISI FILL DATA
    public function auto_complete($nama_mitra)
    {
        $this->db->where('nama_mitra', $nama_mitra);
        $query = $this->db->get('t_mitra');
        return $query->result();
    }

    public function auto_tugas($id_tugas)
    {
        $this->db->where('id_tugas', $id_tugas);
        $query = $this->db->get('t_tugas');
        return $query->result();
    }
    public function auto_ppk($ppk)
    {
        $this->db->where('ppk', $ppk);
        $query = $this->db->get('t_ppk');
        return $query->result();
    }

    public function get_data($keyword)
    {
        $this->db->select('*');
        $this->db->from('t_spkrinci');
        $this->db->join('t_tugas', 't_spkrinci.id_tugas = t_tugas.id_tugas');

        $this->db->where('t_spkrinci.no_spk', $keyword);

        $query = $this->db->get();
        return $query->result();
    }
    // Metode untuk menghapus data berdasarkan id_tugas
    public function hapus_data($no_spk, $id_tugas)
    {
        $this->db->where('no_spk', $no_spk);
        $this->db->where('id_tugas', $id_tugas);
        if ($this->db->delete('t_spkrinci')) {
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil dihapus.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Gagal menghapus data.';
        }
        return $response;
    }

    public function get_last_spk_number($month, $year)
    {
        $this->db->select('SUBSTRING_INDEX(no_spk, "/", 1) AS last_number');
        $this->db->like('no_spk', "/{$month}/{$year}", 'before'); // Menambahkan filter untuk bulan dan tahun
        $this->db->order_by('no_spk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('t_spkrinci');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return ($result) ? $result->last_number : '0000';
        } else {
            // Jika tidak ada nomor SPK sebelumnya untuk bulan dan tahun ini, kembalikan nomor awalan default
            return '0000';
        }
    }

    public function check_id_sobat_in_month($id_sobat, $month, $year)
    {
        $this->db->from('t_spk');
        $this->db->where('id_sobat', $id_sobat);
        $this->db->where('MONTH(tanggal_spk)', $month);
        $this->db->where('YEAR(tanggal_spk)', $year);
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }



    public function simpan_data_spk($data)
    {
        $this->db->insert('t_spk', $data);
        return $this->db->affected_rows() > 0;
    }

    public function update_spk($no_spk, $data)
    {
        $this->db->where('no_spk', $no_spk);
        $this->db->update('t_spk', $data);
        return $this->db->affected_rows() > 0;
    }
    public function check_spk_exists($no_spk)
    {
        $this->db->where('no_spk', $no_spk);
        $query = $this->db->get('t_spk');
        return $query->num_rows() > 0;
    }

    public function save_or_update_spk($data)
    {
        // Asumsi 'no_spk' adalah kunci unik di tabel 't_spk'
        $no_spk = $data['no_spk'];

        if ($this->check_spk_exists($no_spk)) {
            // Data sudah ada, lakukan update
            return $this->update_spk($no_spk, $data);
        } else {
            // Data belum ada, lakukan insert
            return $this->simpan_data_spk($data);
        }
    }
    public function get_spk_by_no($no_spk)
    {
        $this->db->where('no_spk', $no_spk);
        $query = $this->db->get('t_spk');
        return $query->row_array();
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
    
    public function get_existing_spk_number($id_sobat, $month, $year)
    {
        $this->db->select('no_spk');
        $this->db->from('t_spk');
        $this->db->where('id_sobat', $id_sobat);
        $this->db->where('MONTH(tanggal_spk)', $month);
        $this->db->where('YEAR(tanggal_spk)', $year);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->no_spk; // Return the existing SPK number
        }
        return null; // Return null if not found
    }
 
}
